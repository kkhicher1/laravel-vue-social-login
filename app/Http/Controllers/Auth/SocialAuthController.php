<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service)
    {
        $userSocial = Socialite::with($service)->user();

        $users = User::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            Auth::login($users);
            return redirect('/' . loggedInURL());
        } else {
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
            ]);
            $user->userProvider()->create(
                [
                    'image'         => $userSocial->getAvatar(),
                    'provider_id'   => $userSocial->getId(),
                    'provider'      => $service,
                ]
            );
            $user->assignRole('student');
            
            return redirect('/' . loggedInURL());
        }
    }
}
