<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("login", compact("users"));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->save();
    }
}
