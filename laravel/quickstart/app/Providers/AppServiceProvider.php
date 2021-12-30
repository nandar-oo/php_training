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
        $this->app->bind('App\Contracts\Dao\Task\TaskDaoInterface', 'App\Dao\Task\TaskDao');

        $this->app->bind('App\Contracts\Services\Task\TaskServiceInterface', 'App\Services\Task\TaskService');

        $this->app->bind('App\Contracts\Dao\User\UserDaoInterface', 'App\Dao\User\UserDao');

        $this->app->bind('App\Contracts\Services\User\UserServiceInterface', 'App\Services\User\UserService');
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
