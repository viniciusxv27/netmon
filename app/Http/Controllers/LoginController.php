<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('user', Auth::user());
 
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirm-password' => ['required', 'same:password'],
        ]);

        if (User::where('email', $credentials['email'])->exists()) {
            return back()->withErrors([
                'email' => 'Email already registered.',
            ])->onlyInput('email');
        }
 
        $credentials['password'] = Hash::make($credentials['password']);
 
        User::create($credentials);
 
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }

    public function forgot(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
        ]);
 
        $user = User::where('email', $credentials['email'])->first();
 
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email not found.',
            ])->onlyInput('email');
        }
 
        // Enviar e-mail com link para redefinição de senha
 
        return redirect()->route('login');
    }
}