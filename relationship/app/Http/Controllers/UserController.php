<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::with('profile')->get(); // get user 
        $users = User::with('profile')->where('status', 'active')->get(); //only for active user 
        // return $users;
        return view('user', compact('users'));
    }
}
