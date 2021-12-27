<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create'); 
    }

    public function store() {
        // return request()->all();
        $attributes = request()->validate([
            'password' => ['required','min:7', 'max:255'],
                'name' => 'required|max:255',
                'username' => 'required|min:3|max:255|unique:users,username',
                // 'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
                'email' => 'required|email|max:255|unique:users,email',
                // 'password' => 'required|string|min:7|max:255', 
            ]);
        $user = User::create($attributes);

        auth()->login($user);

        // session()->flash('success', 'Your account has been created');
        return redirect('/')->with('success', 'Your account has been created');
    }
}
