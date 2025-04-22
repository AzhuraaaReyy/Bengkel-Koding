<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function formRegister()
    {
        return view('layouts.register');
    }
    public function register(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:225',
                'email' => 'required|string|email|max:225|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'alamat' => 'required|string|max:20',
                'no_hp' => 'required|numeric|digits_between:12,13', // Validasi nomor telepon dengan panjang 12 atau 13 digit
            ]
        );

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pasien',
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,

        ]);

        Auth::login($user);

        return redirect('/dokter');
    }
}
