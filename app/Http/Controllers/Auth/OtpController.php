<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OtpController extends Controller
{
    public function form()
    {
        return view('auth.otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $userId = session('otp_user_id');

        $otp = DB::table('login_otps')
            ->where('user_id', $userId)
            ->where('otp', $request->otp)
            ->where('used', false)
            ->where('expired_at', '>', now())
            ->first();

        if (!$otp) {
            return back()->withErrors(['otp' => 'OTP tidak valid']);
        }

        DB::table('login_otps')
            ->where('id', $otp->id)
            ->update(['used' => true]);

        Auth::loginUsingId($userId);

        session()->forget('otp_user_id');

        return redirect('/home');
    }
}
