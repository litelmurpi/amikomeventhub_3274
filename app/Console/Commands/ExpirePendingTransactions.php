<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

/**
 * Class ExpirePendingTransactions
 *
 * Command to clean up pending transactions that have exceeded their 15-minute expiration window
 * and release their reserved stock back to the event pool.
 *
 * @package App\Console\Commands
 */
class ExpirePendingTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:expire-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire pending transactions that are older than 15 minutes and release reserved stock';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $pendingTransactions = Transaction::where('status', 'Pending')
            ->where('created_at', '<', now()->subMinutes(15))
            ->get();

        $expiredCount = 0;

        foreach ($pendingTransactions as $transaction) {
            $updated = DB::transaction(function () use ($transaction) {
                $trx = Transaction::lockForUpdate()->find($transaction->id);

                if ($trx && $trx->status === 'Pending') {
                    $trx->update(['status' => 'Expired']);
                    if ($trx->event_id) {
                        Event::where('id', $trx->event_id)->increment('stock');
                    }
                    return true;
                }

                return false;
            });

            if ($updated) {
                $expiredCount++;
            }
        }

        $this->info("Successfully expired {$expiredCount} pending transactions and released reserved stock.");

        return Command::SUCCESS;
    }
}
