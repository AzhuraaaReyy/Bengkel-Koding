<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function uploadCoverPhoto(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($request->hasFile('cover_photo')) {
            // Simpan file ke storage/app/public/cover_photos
            $path = $request->file('cover_photo')->store('cover_photos', 'public');

            // Hapus cover photo lama kalau perlu
            if ($user->cover_photo && Storage::disk('public')->exists($user->cover_photo)) {
                Storage::disk('public')->delete($user->cover_photo);
            }

            // Update database user
            $user->cover_photo = $path;
            $user->save();

            return response()->json([
                'success' => true,
                'cover_photo_url' => asset('storage/' . $path),
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'password' => 'nullable|string|min:6',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cek satu-satu, kalau ada input baru, baru update
        if ($request->filled('nama')) {
            $user->nama = $request->nama;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->filled('no_hp')) {
            $user->no_hp = $request->no_hp;
        }

        if ($request->filled('alamat')) {
            $user->alamat = $request->alamat;
        }

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('photo', 'public');


            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            $user->photo = $path;
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
