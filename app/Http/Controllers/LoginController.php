<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function cekLogin(Request $request)
    {
        $cek = $request->validate([
          'email' => 'required|email:dns',
        //    'email' => 'required',
            'password' => 'required|min:3'
        ]);
        if(Auth::guard('user')->attempt($cek, $request->get('remember'))){
            if($request->has('remember')){
                Cookie::queue('email', $request->email,50);
                Cookie::queue('pass', $request->password,50);
            }
            $request->session()->regenerate();

            return redirect()->intended('/dasboard')->with('berhasil','Selamat Datang');
        }elseif(Auth::guard('pengguna')->attempt($cek, $request->get('remember')))
        {
            if($request->has('remember')){
                Cookie::queue('email', $request->email,1440);
                Cookie::queue('pass', $request->password,1440);
            }
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->with('LoginError', 'login gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success','Sukses Logout');

    }

    public function resetpassword(Request $request)
    {
        return view('login.lupasandi');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

}
