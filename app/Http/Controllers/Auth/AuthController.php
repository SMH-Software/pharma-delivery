<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function doLogin(LoginRequest $request) {
       
       $credentials = $request->validated();
       if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if(Auth::user()->role === 'admin'){
                return redirect()->intended(route('admin.index'));
            }

            if(Auth::user()->role === 'user'){
                return redirect()->intended(route('user.index'));
            }
       }

       return to_route('home.login')->withErrors([
        'email' => 'Adresse e-mail ou mot de passe incorrect !',
        'password' => 'Adresse e-mail ou mot de passe incorrect !'
       ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return to_route('home.login');
    }
}
