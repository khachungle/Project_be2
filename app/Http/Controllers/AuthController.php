<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Nếu đăng nhập thành công, chuyển hướng đến /layout_admin
            return redirect()->intended('/layout_admin')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withErrors(['Login details are not valid']);
    }

    public function logout() {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('/');
    }
}
