<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // ================================
    // HALAMAN PROFIL
    // ================================
    public function index()
    {
        $laporans = \App\Models\Laporan::where('id_warga', auth()->id())->get();
        return view('profil.index', compact('laporans'));
    }

    // ================================
    // HALAMAN EDIT PROFIL
    // ================================
    public function edit()
    {
        return view('profil.edit', [
            'user' => Auth::user()
        ]);
    }

    // ================================
    // UPDATE DATA PROFIL
    // ================================
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->address = $request->address;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    // ================================
    // UPDATE FOTO PROFIL
    // ================================
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();

        $filename = time() . '.' . $request->foto->extension();

        $request->foto->storeAs('foto_profil', $filename, 'public');

        $user->foto = $filename;
        $user->save();

        return back()->with('success', 'Foto profil berhasil diperbarui!');
    }

    // ================================
    // HALAMAN KEAMANAN
    // ================================
    public function security()
    {
        return view('profil.security');
    }

    // ================================
    // UPDATE PASSWORD
    // ================================
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'      => 'required',
            'new_password'          => 'required|min:6',
            'confirm_new_password'  => 'required|same:new_password',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah!']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diubah!');
    }
}
    