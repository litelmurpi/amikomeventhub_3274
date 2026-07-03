<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;

/**
 * Class ExpirePendingTransactions
 *
 * Command to clean up pending transactions that have exceeded their 24-hour expiration window.
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
    protected $description = 'Expire pending transactions that are older than 24 hours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $expiredCount = Transaction::where('status', 'Pending')
            ->where('created_at', '<', now()->subHours(24))
            ->update(['status' => 'Expired']);

        $this->info("Successfully expired {$expiredCount} pending transactions.");

        return Command::SUCCESS;
    }
}
