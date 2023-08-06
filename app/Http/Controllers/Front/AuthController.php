<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Guysolamour\Administrable\Http\Controllers\BaseController;

class AuthController extends BaseController
{
     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);


        if (Auth::attempt($credentials)) {
            return Auth::user();
        }

        return response()->json([
            'message' => 'The provided credentials do not match our records.',
        ], 422);
    }

     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'nom'    => ['required'],
            'email'    => ['required', 'email'],
            'phone_number'    => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create($data);

        Auth::login($user);

        return $user;
    }

}
