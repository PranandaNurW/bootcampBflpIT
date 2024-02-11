<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function registration(){
        $context = [
            'title' => 'Register'
        ];
        return view('account.register', $context);
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:255|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        
        return redirect()->route('auth.login')->with('success', 'Registration successful!');
    }

    public function login(){
        $context = [
            "title" => "Login"
        ];
        return view('account.login', $context);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('blog.index')->with('success', 'Welcome back!');
        }

        return back()->with('error', 'Invalid credentials!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
