<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        //check validate
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //redirect to dashboard
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }

        //redirect back when error
        return back()->withErrors([
            'error' => 'Email atau password yang Anda masukan salah',
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registration(Request $request)
    {
        //check validate
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        //create or inserte user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'user';
        $user->save();

        // authenticate user
        Auth::login($user);

        //redirect to home
        return redirect()->route('home.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
