<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthSocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $SosialUser = Socialite::driver('google')->user();
        $registeredUser = User::where('google_id', $SosialUser->id)->first();

        if (!$registeredUser) {
            $user = User::updateOrCreate([
                'google_id' => $SosialUser->id,
            ], [
                'nama' => $SosialUser->name,
                'email' => $SosialUser->email,
                'password' => Hash::make('password'),
                'google_token' => $SosialUser->token,
                'google_refresh_token' => $SosialUser->refreshToken,
                'no_hp' => '-',
                'role' => 'pasien',
                'alamat' => '-'
            ]);

            Auth::login($user);

            return redirect('/dokter');
        }

        Auth::login($registeredUser);

        return redirect('/dokter');
    }
}
