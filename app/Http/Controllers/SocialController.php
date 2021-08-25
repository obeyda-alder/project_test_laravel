<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\ErrorHandler\ErrorEnhancer\UndefinedFunctionErrorEnhancer;

class SocialController extends Controller
{
    public function facebook($server)
    {
        return Socialite::with($server)->redirect();
    }

    public function callback($server)
    {
        return $user = Socialite::with($server)->user();
    }
}
