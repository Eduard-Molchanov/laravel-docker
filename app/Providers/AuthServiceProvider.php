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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot ()
    {
        $this->registerPolicies();

        Gate::define("user-page-view", function (User $user) {
            return $user->roles->role == "user";
        });
        Gate::define("guest-page-view", function (User $user) {
            return $user->roles->role == "guest";
        });
        Gate::define("agent-page-view", function (User $user) {
            return $user->roles->role == "agent";
        });
        Gate::define("admin-page-view", function (User $user) {
            return $user->roles->role == "admin";
        });
        Gate::define("system-page-view", function (User $user) {
            return $user->roles->role == "system";
        });
    }
}
