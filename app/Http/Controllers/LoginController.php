<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->with('logineror', 'Login Gagal');
    }

    public function adminauthenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/admin')->with('berhasil', 'You Have Logged in');
        }

        return back()->with('logineror', 'Login Failed');
    }

    public function logout(Request $request) 
    {
        Auth::Logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
