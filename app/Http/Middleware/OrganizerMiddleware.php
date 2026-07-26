<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OrganizerMiddleware
{
    /**
     * Handle an incoming request.
     * Izinkan user dengan role 'organizer' atau 'superadmin'.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        if (!in_array($user->role, ['organizer', 'superadmin'])) {
            abort(403, 'Halaman ini hanya dapat diakses oleh Penyelenggara Event.');
        }

        // Jika organizer, pastikan sudah punya organisasi & terverifikasi/disetujui
        if ($user->role === 'organizer') {
            $org = $user->organization;
            if (!$org || !$org->isApproved()) {
                return redirect()->route('organizer.pending');
            }
        }

        return $next($request);
    }
}
