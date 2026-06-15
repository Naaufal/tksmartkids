<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\UserProfile;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = session('admin_token');

        if (!$token) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $lastChecked = session('admin_token_last_checked');
        $profile = null;
        $userId = session('admin_user_id');

        if ($lastChecked && $userId && (time() - $lastChecked < 300)) {
            // Retrieve profile from local DB
            $profile = UserProfile::find($userId);
        } else {
            // Verify token with Supabase Auth API
            try {
                $response = Http::withoutVerifying()->withHeaders([
                    'apikey' => config('supabase.anon_key'),
                    'Authorization' => 'Bearer ' . $token,
                ])->timeout(5)->get(config('supabase.url') . '/auth/v1/user');

                if ($response->failed()) {
                    session()->forget(['admin_token', 'admin_user_id', 'admin_token_last_checked']);
                    return redirect()->route('admin.login')->with('error', 'Sesi Anda telah berakhir. Silakan login kembali.');
                }

                $supabaseUser = $response->json();
                $userId = $supabaseUser['id'] ?? null;

                if ($userId) {
                    $profile = UserProfile::find($userId);
                    session([
                        'admin_user_id' => $userId,
                        'admin_token_last_checked' => time(),
                    ]);
                }
            } catch (\Exception $e) {
                // Fallback to local DB if API call fails but we have cached session
                if ($userId) {
                    $profile = UserProfile::find($userId);
                } else {
                    return redirect()->route('admin.login')->with('error', 'Koneksi ke server autentikasi gagal.');
                }
            }
        }

        if (!$profile || !$profile->is_active) {
            session()->forget(['admin_token', 'admin_user_id', 'admin_token_last_checked']);
            return redirect()->route('admin.login')->with('error', 'Akun Anda tidak aktif atau tidak terdaftar sebagai admin.');
        }

        // Share the profile with request and all views
        $request->merge(['admin_profile' => $profile]);
        view()->share('admin_profile', $profile);

        return $next($request);
    }
}
