<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Models\admin;
use GuzzleHttp\Middleware;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth::attempt;



class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    public function AddAuth()
    {
        return view('AuthCustom.Auth');
    }

    public function site()
    {
        return view('AuthCustom.site');
    }

    public function Admin()
    {
        return view('AuthCustom.admin');
    }


    public function AdminLogin()
    {
        return view('AuthCustom.adminLogin');
    }


    public function checkAdminLogin(Request $request)
    {

        // start validator ....

        $validated = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // End validator


        if ($validated) {
            $credentials = $request->only('email', 'password');


            if (Auth::guard('admin') && Auth::attempt($credentials)) {


                return redirect()->intended('/Admin');
            } else {

                return back()->withInput($request->only('email'));
                // return 'this is not found ' .  $request->ip();
            }
        }
    }
}
