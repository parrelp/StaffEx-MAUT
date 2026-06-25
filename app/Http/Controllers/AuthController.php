<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    // Validasi input email dan password
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cari user berdasarkan email
    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'User not found.');
    }

    // Periksa apakah password cocok
    if (!\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Invalid Password.');
    }

    // Login berhasil, buat sesi user
    \Illuminate\Support\Facades\Auth::login($user);
    $request->session()->regenerate();

    // Redirect sesuai role
    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'manager':
            return redirect()->route('manager.dashboard');
        default:
            \Illuminate\Support\Facades\Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized role.');
    }
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
