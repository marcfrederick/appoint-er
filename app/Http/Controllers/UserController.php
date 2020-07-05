<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('user.index', ['users' => User::paginate()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->view('user.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        Log::info('Deleted user', ['user_id' => $user->id]);

        Session::push('toasts', 'User deleted successfully!');
        return response()->redirectTo(RouteServiceProvider::HOME);
    }
}
