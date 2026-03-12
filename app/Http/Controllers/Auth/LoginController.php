<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\LoginOtpMail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
     * |--------------------------------------------------------------------------
     * | Login Controller
     * |--------------------------------------------------------------------------
     * |
     * | Controller ini menangani autentikasi user.
     * | Setelah password benar, user akan diminta OTP dari email.
     * |
     */

    use AuthenticatesUsers;

    /**
     * Redirect setelah login berhasil
     */
    protected $redirectTo = '/home';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Method ini dipanggil setelah login password berhasil
     */
    protected function authenticated(Request $request, $user)
    {
        // Generate OTP 6 digit
        $otp = rand(100000, 999999);

        // Simpan OTP
        DB::table('login_otps')->insert([
            'user_id' => $user->id,
            'otp' => $otp,
            'expired_at' => now()->addMinutes(5),
            'used' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Kirim email OTP
        Mail::to($user->email)->send(new LoginOtpMail($otp));

        // Logout sementara
        Auth::logout();

        // Simpan user id di session
        session(['otp_user_id' => $user->id]);

        // Redirect ke halaman OTP
        return redirect()->route('otp.form');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
