<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use App\Services\WhatsAppService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AbandonedCartReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:reminder-wa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send WhatsApp reminder messages for pending ticket transactions older than 1 hour';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $abandonedTransactions = Transaction::with('event')
            ->where('status', 'Pending')
            ->whereNotNull('snap_token')
            ->where('created_at', '<', now()->subHour())
            ->where('created_at', '>', now()->subHours(24))
            ->whereNull('wa_reminder_sent_at')
            ->get();

        $sentCount = 0;

        foreach ($abandonedTransactions as $trx) {
            $eventTitle = $trx->event->title ?? 'AmikomEventHub';
            $snapUrl = config('midtrans.is_production')
                ? "https://app.midtrans.com/snap/v2/vtweb/{$trx->snap_token}"
                : "https://app.sandbox.midtrans.com/snap/v2/vtweb/{$trx->snap_token}";

            $formattedTotal = 'Rp ' . number_format($trx->total_price, 0, ',', '.');
            $remainingHours = max(1, 24 - (int) $trx->created_at->diffInHours(now()));

            $message = "⏰ *Pengingat Pembayaran Tiket*\n\n"
                . "Halo {$trx->customer_name},\n"
                . "Pesanan tiket Anda untuk *{$eventTitle}* masih menunggu pembayaran.\n\n"
                . "🎫 Order ID: `{$trx->order_id}`\n"
                . "💰 Total Pembayaran: *{$formattedTotal}*\n"
                . "⏳ Batas Waktu: Sisa {$remainingHours} jam lagi sebelum otomatis dibatalkan.\n\n"
                . "Klik link berikut untuk menyelesaikan pembayaran:\n"
                . "👉 {$snapUrl}\n\n"
                . "Abaikan pesan ini jika Anda sudah membatalkan pesanan.\n"
                . "— AmikomEventHub";

            if (WhatsAppService::send($trx->customer_phone, $message)) {
                $trx->update(['wa_reminder_sent_at' => now()]);
                $sentCount++;
            }
        }

        $this->info("Berhasil mengirim {$sentCount} notifikasi pengingat WhatsApp.");
        return Command::SUCCESS;
    }
}
