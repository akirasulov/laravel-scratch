<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create() {
        return view('session.create');
    }

    public function store() {

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => ['required'],
        ]);

        if (! auth()->attempt($attributes)) {
            return back()
                    ->withInput()
                    ->withErrors(['email' => 'Maybe you are not verified']);
                }
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back');

    
    // throw ValidationException::withMessages([
    //     'email' => 'Maybe you are not verified'
    // ]);
}

    public function destroy() {
        auth()->logout();

        return redirect('/')->with('succes', 'Goodbye');
    }
}
