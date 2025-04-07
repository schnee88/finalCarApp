<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\Comment;
use App\Policies\CarPolicy;
use App\Policies\CommentPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

     protected $policies = [
        Car::class => CarPolicy::class,
        Comment::class => CommentPolicy::class,
    ];
    
    
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
