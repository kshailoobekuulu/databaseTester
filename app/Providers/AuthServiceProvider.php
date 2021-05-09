<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\User' => 'App\Policies\ManageUsersPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-user-information', function (User $user) {
            return $user->getRole() === User::SUPER_ADMIN;
        });

        Gate::define('administrate', function (User $user) {
            return $user->getRole() == User::SUPER_ADMIN || $user->getRole() == User::ADMIN;
        });
    }
}
