<?php

namespace App\Providers;

 use App\Models\User;
 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('level', function (User $user){
            return $user -> level == 'admin';
        });

        Gate::define('is-owner', function (User $user, object $register){
            return $user->id === $register->user_id;
        });

    }
}
