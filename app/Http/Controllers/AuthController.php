<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return  view('auth.login-view');
    }

    public function autenticated(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
            // if (Auth::user()->role == 'admin') {
            //     return redirect('/admin');
            // } elseif (Auth::user()->role == 'dosen') {
            //     return redirect('/dosen');
            // } elseif (Auth::user()->role == 'mahasiswa') {
            //     return redirect('/mahasiswa');
            // }
        }

        return back()->withErrors([
            'loginFailed' => 'Email atau password salah'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}