<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Tampilkan halaman register
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Proses registrasi pengguna baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => Hash::make($request->password),
            'role'     => 'warga', // default role jika tidak diisi
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.warga')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek peran user
            if ($user->role === 'admin') {
                return redirect()->route('dashboard.admin')->with('success', 'Login berhasil sebagai admin.');
            }

            return redirect()->route('dashboard.warga')->with('success', 'Login berhasil.');
        }

        // Jika gagal login
        return back()->with('error', 'Email atau password salah.');
    }

    /**
     * Logout pengguna
     */
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Kembali ke halaman dashboard (landing utama)
    return redirect()->route('dashboard')->with('success', 'Anda berhasil logout.');
}

}
