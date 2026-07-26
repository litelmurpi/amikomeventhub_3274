<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    /**
     * Sanitize Indonesian phone numbers into standard 628xxxxxxxx format.
     *
     * @param string $phone Raw user phone number.
     * @return string Normalized phone number.
     */
    public static function sanitizePhoneNumber(string $phone): string
    {
        // Strip all non-digit characters
        $cleaned = preg_replace('/[^0-9]/', '', $phone);

        // Convert leading 08xx to 628xx
        if (str_starts_with($cleaned, '0')) {
            $cleaned = '62' . substr($cleaned, 1);
        }

        // Add 62 prefix if starts with 8
        if (str_starts_with($cleaned, '8')) {
            $cleaned = '62' . $cleaned;
        }

        return $cleaned;
    }

    /**
     * Send a WhatsApp message via Fonnte API.
     *
     * @param string $phone Customer WhatsApp phone number.
     * @param string $message Text message payload.
     * @return bool
     */
    public static function send(string $phone, string $message): bool
    {
        $sanitizedPhone = self::sanitizePhoneNumber($phone);
        $token = config('fonnte.token');

        if (!$token) {
            Log::warning("WhatsApp Notification Skipped: FONNTE_TOKEN is not configured in .env file for target {$sanitizedPhone}.");
            return false;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->post(config('fonnte.api_url', 'https://api.fonnte.com/send'), [
                'target'  => $sanitizedPhone,
                'message' => $message,
            ]);

            if ($response->successful()) {
                Log::info("WhatsApp message successfully dispatched to {$sanitizedPhone}");
                return true;
            }

            Log::error("WhatsApp dispatch failed for {$sanitizedPhone}: " . $response->body());
            return false;
        } catch (\Exception $e) {
            Log::error("WhatsApp dispatch exception for {$sanitizedPhone}: " . $e->getMessage());
            return false;
        }
    }
}
