<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Dao\Student\StudentDaoInterface', 'App\Dao\Student\StudentDao');

        $this->app->bind('App\Contracts\Services\Student\StudentServicesInterface', 'App\Services\Student\StudentService');

        $this->app->bind('App\Contracts\Dao\User\UserDaoInterface', 'App\Dao\User\UserDao');

        $this->app->bind('App\Contracts\Services\User\UserServicesInterface', 'App\Services\User\UserService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
