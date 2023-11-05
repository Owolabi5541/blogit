<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   public function register(){
       return view('register.create');
   }

   public function store(){
//       return request()->all();

       $attributes = request()->validate([
           'name' => 'required|max:255',
           'username' => 'required|max:255|min:3|unique:users,username',
           'email' => 'required|max:255|min:7|unique:users,email',
           'password' => 'required|max:255|min:7',
       ]);


       $user = User::create($attributes);

       auth()->login($user);

//       session()->flash('success','Your account has been credited.');

       return redirect('/')->with('success','Your account has been created.');;
//       dd("You're successfully logged in");


   }
}
