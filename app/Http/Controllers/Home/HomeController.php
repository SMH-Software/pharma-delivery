<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        return view('home.connexion');
    }

    public function create(){
        return view('home.inscription');
    }

    public function store(UserPostRequest $request){
        User::create($request->validated(), [
            'password' => Hash::make($request->validated('password'))
        ]);

        return redirect()
            ->route('home.login')
            ->with([
                'success' => 'Vous êtes maintenant inscrit sur PharmaDelivery',
                'email'=> $request->validated('email')
            ]);
            
    }
}
