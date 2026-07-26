<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CheckinController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OrganizationController as AdminOrganizationController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EticketController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Organizer\CheckinController as OrganizerCheckinController;
use App\Http\Controllers\Organizer\OrganizerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterOrganizerController;
use App\Http\Controllers\User\TicketController;
use Illuminate\Support\Facades\Route;

// PWA Service Worker & Manifest Routes (Guarantees 200 OK across all hosting environments)
Route::get('/manifest.json', function () {
    return response()->file(public_path('manifest.json'), [
        'Content-Type' => 'application/json'
    ]);
});

Route::get('/sw.js', function () {
    return response()->file(public_path('sw.js'), [
        'Content-Type' => 'application/javascript'
    ]);
});

Route::get('/offline.html', function () {
    return response()->file(public_path('offline.html'));
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event-detail/{slug}', [EventController::class, 'show'])->name('event-detail');
Route::get('/checkout/{slug}', [PaymentController::class, 'create'])->name('checkout')->middleware('auth');
Route::post('/checkout/{slug}', [PaymentController::class, 'process'])->name('checkout.process')->middleware('auth');
Route::post('/promo/validate', [PaymentController::class, 'validatePromo'])->name('promo.validate')->middleware('auth');
Route::get('/payment/success/{order_id}', [PaymentController::class, 'success'])->name('payment.success')->middleware('auth');
Route::get('/eticket/{ticket_code}', [EticketController::class, 'show'])->name('eticket.show');
Route::get('/my-tickets', [TicketController::class, 'index'])->name('user.tickets')->middleware('auth');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

// Organizer Registration
Route::get('/become-organizer', [RegisterOrganizerController::class, 'create'])->name('organizer.register')->middleware('auth');
Route::post('/become-organizer', [RegisterOrganizerController::class, 'store'])->name('organizer.register.store')->middleware('auth');

// Auth Routes (hanya untuk guest / belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout (harus sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Organizer Panel Routes
Route::prefix('organizer')->name('organizer.')->group(function () {
    Route::get('/pending', [OrganizerController::class, 'pending'])->name('pending')->middleware('auth');

    Route::middleware('isOrganizer')->group(function () {
        Route::get('/', [OrganizerController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [OrganizerController::class, 'profile'])->name('profile');
        Route::put('/profile', [OrganizerController::class, 'updateProfile'])->name('profile.update');

        Route::get('/events', [OrganizerController::class, 'events'])->name('events');
        Route::get('/events/create', [OrganizerController::class, 'createEvent'])->name('events.create');
        Route::post('/events', [OrganizerController::class, 'storeEvent'])->name('events.store');
        Route::get('/events/{event}/edit', [OrganizerController::class, 'editEvent'])->name('events.edit');
        Route::put('/events/{event}', [OrganizerController::class, 'updateEvent'])->name('events.update');
        Route::delete('/events/{event}', [OrganizerController::class, 'destroyEvent'])->name('events.destroy');

        Route::get('/checkin', [OrganizerCheckinController::class, 'index'])->name('checkin');
        Route::post('/checkin', [OrganizerCheckinController::class, 'verify'])->name('checkin.verify');
        Route::post('/checkin/ajax', [OrganizerCheckinController::class, 'verifyAjax'])->name('checkin.ajax');
    });
});

// Admin Routes (dilindungi middleware isAdmin)
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/organizations', [AdminOrganizationController::class, 'index'])->name('organizations');
    Route::post('/organizations/{organization}/approve', [AdminOrganizationController::class, 'approve'])->name('organizations.approve');
    Route::post('/organizations/{organization}/reject', [AdminOrganizationController::class, 'reject'])->name('organizations.reject');

    Route::get('/events', [AdminController::class, 'events'])->name('events');
    Route::get('/events/create', [AdminController::class, 'createEvent'])->name('events.create');
    Route::post('/events', [AdminController::class, 'storeEvent'])->name('events.store');
    Route::get('/events/{event}/edit', [AdminController::class, 'editEvent'])->name('events.edit');
    Route::put('/events/{event}', [AdminController::class, 'updateEvent'])->name('events.update');
    Route::delete('/events/{event}', [AdminController::class, 'destroyEvent'])->name('events.destroy');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::post('/transactions/expire-pending', [TransactionController::class, 'expirePending'])->name('transactions.expire-pending');
    Route::get('/checkin', [CheckinController::class, 'index'])->name('checkin');
    Route::post('/checkin', [CheckinController::class, 'verify'])->name('checkin.verify');
    Route::post('/checkin/ajax', [CheckinController::class, 'verifyAjax'])->name('checkin.ajax');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::resource('/promo-codes', PromoCodeController::class)->names('promo-codes');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/partners', [PartnerController::class, 'index'])->name('partners');
    Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
    Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('/partners/{partner}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::put('/partners/{partner}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');

    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries');
    Route::get('/galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('/galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('/galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('/galleries/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
});

Route::get('/uts-guide', function () {
    return view('uts_guide');
})->name('uts-guide');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');
Route::get('/kontak', function () {
    return view('contact');
});
Route::get('/profil', function () {
    return view('profil');
});
Route::get('/katalog', [EventController::class, 'katalog'])->name('katalog');
Route::get('/bantuan', function () {
    return view('bantuan');
});