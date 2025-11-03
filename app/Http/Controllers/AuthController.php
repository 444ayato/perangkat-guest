<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        return view('pages.auth.login');
    }

    // Proses login
    public function loginProses(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('guest.dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
