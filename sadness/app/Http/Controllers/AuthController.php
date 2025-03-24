<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view("registration");
    }
    public function login()
    {
        return view("login");
    }

    public function makeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'status' => 'required|string|max:255',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);

        Auth::login($user);
        return redirect()->route('login');
    }

    public function makeLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    //show dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    //  logout
    public function makeLogout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
