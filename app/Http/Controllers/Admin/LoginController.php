<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\UserProfile;

class LoginController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function loginForm()
    {
        if (session()->has('admin_token')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Process the login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            // Call Supabase Auth HTTP API
            $response = Http::withoutVerifying()->withHeaders([
                'apikey' => config('supabase.anon_key'),
                'Content-Type' => 'application/json',
            ])->post(config('supabase.url') . '/auth/v1/token?grant_type=password', [
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]);

            if ($response->failed()) {
                $errorData = $response->json();
                $errorMessage = $errorData['error_description'] ?? 'Email atau password salah.';
                return back()->withErrors(['email' => $errorMessage])->withInput();
            }

            $authData = $response->json();
            $accessToken = $authData['access_token'] ?? null;
            $supabaseUser = $authData['user'] ?? null;
            $userId = $supabaseUser['id'] ?? null;

            if (!$accessToken || !$userId) {
                return back()->withErrors(['email' => 'Autentikasi gagal. Silakan coba lagi.'])->withInput();
            }

            // Check if user has active profile in local PostgreSQL db
            $profile = UserProfile::find($userId);

            if (!$profile) {
                return back()->withErrors(['email' => 'Akun Anda belum terdaftar di dashboard admin.'])->withInput();
            }

            if (!$profile->is_active) {
                return back()->withErrors(['email' => 'Akun Anda tidak aktif. Silakan hubungi superadmin.'])->withInput();
            }

            // Store in session
            session([
                'admin_token' => $accessToken,
                'admin_user_id' => $userId,
                'admin_token_last_checked' => time(),
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, ' . $profile->name . '!');

        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal terhubung ke server autentikasi: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Log out of the admin panel.
     */
    public function logout()
    {
        $token = session('admin_token');

        if ($token) {
            try {
                // Call Supabase Auth logout API
                Http::withoutVerifying()->withHeaders([
                    'apikey' => config('supabase.anon_key'),
                    'Authorization' => 'Bearer ' . $token,
                ])->post(config('supabase.url') . '/auth/v1/logout');
            } catch (\Exception $e) {
                // Ignore API failure on logout to ensure session is cleared locally
            }
        }

        // Clear local session
        session()->forget(['admin_token', 'admin_user_id', 'admin_token_last_checked']);
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil logout.');
    }
}
