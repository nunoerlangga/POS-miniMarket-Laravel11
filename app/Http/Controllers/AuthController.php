<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\UsersModel;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', ' Login berhasil. Selamat datang kembali!');;
        }

        return back()->withErrors([
            'username' => 'Login gagal, cek kembali username dan password.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_user' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:t_users,username',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:admin,kasir',
        ]);
    
        // Simpan user baru
        UsersModel::create([
            'nama_user' => $validated['nama_user'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);
    
        // Login otomatis setelah registrasi
        $user = UsersModel::where('username', $validated['username'])->first(); // Ambil user berdasarkan username
        Auth::guard('web')->login($user); // Login menggunakan guard 'web'
    
        // Redirect ke halaman utama setelah registrasi
        return redirect('/')->with('success', 'Registrasi berhasil. Selamat datang!');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
