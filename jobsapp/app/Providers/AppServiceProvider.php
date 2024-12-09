<?php

namespace App\Providers;

use App\Models\JobListing;
use App\Policies\JobListingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register policies
        $this->registerPolicies();

        // Define Gates
        Gate::define('edit', [JobListingPolicy::class, 'edit']);
        Gate::define('delete', [JobListingPolicy::class, 'delete']);
    }
}
