<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;

class SocialAuthController extends Controller
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        $socialiteUser = Socialite::driver($provider)->user();

        $user = User::query()
            ->firstOrNew([
                'provider_id' => $socialiteUser->getId(),
                'provider' => $provider,
            ], [
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
            ]);

        Auth::login($user, true);

        return redirect()->route('dashboard');
    }
}
