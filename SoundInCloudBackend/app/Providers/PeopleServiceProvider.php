<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class PeopleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @return void
     */
    public function boot()
    {
        $users = User::all();
        view()->composer('*', function (View $view) use ($users) {
            $view->with('people', $users);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
