<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan form login
    public function index()
    {
        // Sesuaikan dengan folder "guest"
        return view('login-form');
    }

    // Memproses form login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'username' => 'required',
                'password' => [
                    'required',
                    'min:3',
                    'regex:/[A-Z]/' // harus mengandung huruf kapital
                ],
            ],
            [
                'username.required' => 'Username wajib diisi.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 3 karakter.',
                'password.regex' => 'Password harus mengandung huruf kapital.',
            ]
        );

        $username = $request->username;
        $password = $request->password;

        // Jika username dan password sama → berhasil login
        if ($username === $password) {
            return view('guest.welcome-page', compact('username'));
        }

        // Jika tidak sesuai
        return back()->withErrors(['login' => 'Username dan password harus sama.'])->withInput();
    }
}