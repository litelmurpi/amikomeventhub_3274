<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterOrganizerController extends Controller
{
    /**
     * Tampilkan form pendaftaran organisasi baru.
     */
    public function create()
    {
        $user = Auth::user();

        // Jika user sudah punya organisasi, redirect sesuai status
        if ($user->organization) {
            if ($user->organization->isApproved()) {
                return redirect()->route('organizer.dashboard');
            }
            return redirect()->route('organizer.pending');
        }

        return view('organizer.register');
    }

    /**
     * Proses registrasi atau pengajuan ulang organisasi baru dan upgrade role user ke 'organizer'.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Guard: Jika sudah punya organisasi dan statusnya pending/approved, redirect ke status
        if ($user->organization && !$user->organization->isRejected()) {
            return redirect()->route('organizer.pending');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:organizations,name,' . ($user->organization->id ?? 'NULL'),
            'description' => 'nullable|string',
            'phone_number' => 'required|string|max:20',
            'social_media' => 'nullable|string|max:255',
            'organization_type' => 'required|in:internal,external',
            'logo' => 'nullable|image|max:2048',
        ]);

        $logoPath = $user->organization->logo_path ?? null;
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('organizations', 'public');
            $logoPath = 'storage/' . $path;
        }

        if ($user->organization && $user->organization->isRejected()) {
            // Update existing rejected organization for re-submission
            $user->organization->update([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']) . '-' . Str::random(5),
                'description' => $validated['description'] ?? null,
                'phone_number' => $validated['phone_number'],
                'social_media' => $validated['social_media'] ?? null,
                'organization_type' => $validated['organization_type'],
                'logo_path' => $logoPath,
                'status' => 'pending',
                'rejection_reason' => null,
                'is_verified' => false,
            ]);
        } else {
            // Create new organization
            Organization::create([
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']) . '-' . Str::random(5),
                'description' => $validated['description'] ?? null,
                'phone_number' => $validated['phone_number'],
                'social_media' => $validated['social_media'] ?? null,
                'organization_type' => $validated['organization_type'],
                'logo_path' => $logoPath,
                'owner_id' => $user->id,
                'status' => 'pending',
                'is_verified' => false,
            ]);
        }

        // Upgrade role user jika belum organizer
        if ($user->role !== 'organizer') {
            $user->update(['role' => 'organizer']);
        }

        return redirect()->route('organizer.pending')
            ->with('success', 'Pendaftaran organisasi berhasil dikirim/diajukan ulang! Silakan tunggu peninjauan dari Superadmin.');
    }
}
