<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view("register");
    }
    public function showLogin()
    {
        return view("login");
    }
    public function showDashboard()
    {
        return view("dashboard");
    }

    public function makeRegister(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|string|email|unique:users",
            "password" => "required|string|min:6",
            "address" => "required|string|max:255",
        ]);
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "address" => $request->address,
        ]);
        Auth::login($user);
        return redirect()->route("login")->with("success", "User Register Successfully!");
    }

    public function makeLogin(Request $request)
    {
        $credentials = $request->validate([
            "email" => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'User Login Successfully!');
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }


    public function makeLogout(Request $request)
    {
        \Log::info('Session Data', ['session' => session()->all()]);
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Successfully');
    }
}
