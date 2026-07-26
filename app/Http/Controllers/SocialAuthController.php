<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class SocialAuthController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman login Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Menangani callback dari Google setelah pengguna berhasil login.
     */
    public function handleGoogleCallback()
    {
        try {
            // Dapatkan data user dari Google
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah user dengan email ini sudah ada di database
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Jika user sudah ada (misal sebelumnya daftar manual), update google_id dan avatar
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
            } else {
                // Jika user belum ada, buat akun baru
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => null, // Password dikosongkan karena login via Google
                    'role' => 'user', // Default role adalah user biasa
                ]);
            }

            // Login-kan user
            Auth::login($user);

            // Arahkan ke halaman utama atau dashboard
            return redirect()->intended('/');

        } catch (Exception $e) {
            // Jika terjadi error, kembalikan ke halaman login dengan pesan error
            return redirect('/login')->with('error', 'Gagal login menggunakan Google. Silakan coba lagi.');
        }
    }
}