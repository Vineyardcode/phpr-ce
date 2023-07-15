<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register form

    public function create() {
        return view('users.register');
    }

    //store user
    public function store(Request $request) {
        $formFields  = $request->validate([
            'name' => ['required', 'min:2'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:5'],
        ]);


        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message', 'Profil vytvořen');
    }

    //log in user
    public function login() {
        return view('users.login');
    }

    //validate user
    public function authenticate(Request $request) {
        $formFields  = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'May the light of bogoya illuminates your path');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out');
    }
}
