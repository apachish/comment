<?php

namespace App\Http\Controllers;

use App\Events\Registered;
use App\Http\Requests\StoreUserPost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.json')->only('store');
    }
    public function store(Request $request){

//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6',
//            'city_id' => 'required|numeric|min:0',
//        ]);
//
        $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'city_id' => $request['city_id'],
            'password' => Hash::make($request['password']),
        ]);
        event(new Registered($user));
        return $user;
    }
}
