<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'alamat' => 'nullable|string',
            'no_hp'  => 'nullable|string',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index')
            ->with('success', 'Data pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil dihapus');
    }

    public function show($id)
{
    $user = User::findOrFail($id);
    return view('admin.users.show', compact('user'));
}

}
