<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Fonnte WhatsApp API Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for Fonnte WhatsApp Notification Gateway service.
    |
    */

    'token'   => env('FONNTE_TOKEN', ''),
    'api_url' => env('FONNTE_API_URL', 'https://api.fonnte.com/send'),
];
