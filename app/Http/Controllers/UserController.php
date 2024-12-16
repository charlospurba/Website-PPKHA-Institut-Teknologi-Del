<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('SIK.Kelolapengguna.KelolaPengguna', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('kelola_pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Pengguna tidak ditemukan'], 404);
    }

    try {
        $user->delete();
        return response()->json(['success' => true, 'message' => 'Pengguna berhasil dihapus']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna: ' . $e->getMessage()], 500);
    }
}


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:5',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $request->filled('password') ? Hash::make($validatedData['password']) : $user->password,
        ]);

        return redirect()->route('kelola_pengguna')->with('success', 'Data pengguna berhasil diperbarui.');
    }
}
