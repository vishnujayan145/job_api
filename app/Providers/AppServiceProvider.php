<?php

namespace App\Providers;

use App\Models\TaskJob;
use App\Policies\TaskJobPolicy;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        TaskJob::class => TaskJobPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }
    
}
