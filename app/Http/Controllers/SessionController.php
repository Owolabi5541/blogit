<?php

namespace App\Http\Controllers;

//use Cassandra\Exception\ValidationException;
//use Cassandra\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

//    public function store()
//    {
//        $attributes = request()->validate([
//            'email' => 'required|email',
//            'password' => 'required'
//        ]);
//
//        if(auth()->attempt($attributes)) {
//            return redirect('/')->with('success', 'Welcome Back!');
//        }
//
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified'
//        ]);
//
//
////        throw ValidationException::withMessages([
////            'email' => 'Your provided credentials could not be verified'
////        ]);
//    }


    public function store()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

//        $correct = auth()->attempt($credentials);
//
//        if($correct){
//            return redirect('/');
//        }


//        dd($credentials);
        if (! Auth::attempt($credentials)) {
            return back()->withInput()->withErrors(['email' => 'Your provided credentials could not be verified']);
        }


//        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');

    }



    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye
        !');
    }


}
