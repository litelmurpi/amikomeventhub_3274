<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;
use App\Models\Event;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class PromoCodeController
 *
 * Handles management of discount promo codes in the Admin Panel.
 *
 * @package App\Http\Controllers\Admin
 */
class PromoCodeController extends Controller
{
    /**
     * Display a listing of promo codes.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $promoCodes = PromoCode::with('event')->latest()->paginate(15);
        return view('admin.promo-codes.index', compact('promoCodes'));
    }

    /**
     * Show the form for creating a new promo code.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $events = Event::orderBy('title')->get();
        return view('admin.promo-codes.create', compact('events'));
    }

    /**
     * Store a newly created promo code in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code'        => 'required|string|unique:promo_codes,code|max:50',
            'type'        => 'required|in:fixed,percent',
            'value'       => 'required|integer|min:1',
            'event_id'    => 'nullable|exists:events,id',
            'max_uses'    => 'required|integer|min:0',
            'valid_until' => 'nullable|date|after_or_equal:today',
        ]);

        PromoCode::create([
            'code'        => strtoupper($request->code),
            'type'        => $request->type,
            'value'       => $request->value,
            'event_id'    => $request->event_id,
            'max_uses'    => $request->max_uses,
            'valid_until' => $request->valid_until,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()->route('admin.promo-codes.index')
            ->with('success', 'Kode promo berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified promo code.
     *
     * @param \App\Models\PromoCode $promoCode
     * @return \Illuminate\View\View
     */
    public function edit(PromoCode $promoCode): View
    {
        $events = Event::orderBy('title')->get();
        return view('admin.promo-codes.edit', compact('promoCode', 'events'));
    }

    /**
     * Update the specified promo code in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PromoCode $promoCode
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, PromoCode $promoCode): RedirectResponse
    {
        $request->validate([
            'code'        => 'required|string|max:50|unique:promo_codes,code,' . $promoCode->id,
            'type'        => 'required|in:fixed,percent',
            'value'       => 'required|integer|min:1',
            'event_id'    => 'nullable|exists:events,id',
            'max_uses'    => 'required|integer|min:0',
            'valid_until' => 'nullable|date',
        ]);

        $promoCode->update([
            'code'        => strtoupper($request->code),
            'type'        => $request->type,
            'value'       => $request->value,
            'event_id'    => $request->event_id,
            'max_uses'    => $request->max_uses,
            'valid_until' => $request->valid_until,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()->route('admin.promo-codes.index')
            ->with('success', 'Kode promo berhasil diperbarui.');
    }

    /**
     * Remove the specified promo code from storage.
     *
     * @param \App\Models\PromoCode $promoCode
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PromoCode $promoCode): RedirectResponse
    {
        $promoCode->delete();

        return redirect()->route('admin.promo-codes.index')
            ->with('success', 'Kode promo berhasil dihapus.');
    }
}
