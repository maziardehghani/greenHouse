<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\OTPsms;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

    public function login(Request $request)
    {

        $request->validate([
            'cellphone' => 'required|iran_mobile',
        ]);
        $user = User::where('cellphone' , $request->cellphone)->first();

        $otp = mt_rand(100000 , 999999);
        if ($user)
        {
            $user->update([
                'login_token' => $request->_token,
                'otp' => $otp,
            ]);

        }else
        {
            $user = User::create([
                'login_token' => $request->_token,
                'cellphone' => $request->cellphone,
                'otp' => $otp,
            ]);

        }
        $user->notify(new OTPsms($otp));

        return redirect()->route('verification')->with('token' , $request->_token);
    }

    public function verification(Request $request)
    {
        if ($request->method() == 'GET')
        {
            return view('auth.verification');
        }
        $request->validate([
            'otp' => 'required'
        ]);
        $user = User::where('login_token' , $request->_token)->firstOrFail();
        if ($user->otp == $request->otp)
        {
            auth()->login($user, $remember = true);
            return redirect()->route('home.index');
        }
        {
            $message = '<div class="alert alert-warning alert-dismissible fade show mb-5 rounded" role="alert"><div>کد احراز هویت شما مطابقت ندارد  </div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return redirect()->route('login')->with('msg' , $message);
        }
    }
}
