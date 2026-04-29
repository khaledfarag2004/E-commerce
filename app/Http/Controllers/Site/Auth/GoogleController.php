<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->setHttpClient(new \GuzzleHttp\Client([
            'verify' => false,
        ]))->user();

        $user = User::updateOrCreate(
            [
                'email' => $googleUser->getEmail()],
            [
                'id' => $googleUser->getId(),
                'role_id' => 2,
                'name' => $googleUser->getName(),
                'password' => bcrypt(str()->random(10)),
            ]
        );

        Auth::login($user);

        return redirect('/');

    }
}
