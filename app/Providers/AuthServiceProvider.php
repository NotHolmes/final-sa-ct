<?php

namespace App\Providers;

use App\Models\Complaint;
use App\Models\User;
use App\Policies\ComplaintPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Complaint::class => ComplaintPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-complaint', function (User $user, Complaint $complaint) {
            return $user->isAdmin() or $user->isEditor() or
                ($user->isUser() and $complaint->user_id === $user->id);
        });

        Gate::define('create-complaint', function (User $user) {
            return true;
        });
    }
}
