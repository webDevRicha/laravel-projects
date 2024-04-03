<?php

namespace App\Providers;

use App\Interfaces\ToDoListInterface;
use App\Repositories\ToDoListRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

     public function boot()
     {
     }

    /**
        * Register the application services.
        *
        * @return void
    */
    public function register(){
        $this->app->bind(ToDoListInterface::class, ToDoListRepository::class);
    }
}