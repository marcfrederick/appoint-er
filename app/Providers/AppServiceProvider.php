<?php
declare(strict_types=1);

namespace App\Providers;

use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** @var int */
    public static $defaultStringLength = 191;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(self::$defaultStringLength);
        Paginator::defaultView('pagination.default');
        Paginator::defaultSimpleView('pagination.simple');

        \Blade::if('isCurrentUser', function (User $user) {
            $id = Auth::id();
            return !is_null($id) && Auth::id() == $user->id;
        });
    }
}
