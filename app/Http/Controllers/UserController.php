<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }
}
