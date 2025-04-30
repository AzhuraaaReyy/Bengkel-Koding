<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\periksa;
use Carbon\Carbon;
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
                'alamat' => '-',
                'photo' => '',
                'cover_photo' => '',

            ]);
            $user = periksa::updateOrCreate([
                'id_pasien' => $user->id,
                'id_dokter' => null, // atau isi sesuai kebutuhan
                'tgl_periksa' => Carbon::now()->toDateString(),
                'catatan' => '-',
                'biaya_periksa' => 0,
            ]);


            Auth::login($user);

            return redirect('/dokter');
        }

        Auth::login($registeredUser);

        return redirect('/dokter');
    }
}
