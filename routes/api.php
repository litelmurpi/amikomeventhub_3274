<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider or bootstrap/app.php
| within a group which is assigned the "api" middleware group.
|
*/

// Midtrans Webhook Callback Route (exempted from CSRF automatically by api group)
Route::post('/payment/notification', [PaymentController::class, 'callback'])->name('payment.notification');
