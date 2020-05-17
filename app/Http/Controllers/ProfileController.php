<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    function show($id)
    {
        return view('profile', ['user' => User::findOrFail($id)]);
    }
}
