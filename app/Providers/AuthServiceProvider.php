<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access_course',function (User $user,$courseID){
            if($user->role->name != 'Admin'){
                return in_array($courseID,$user->courses->pluck('id')->toArray())
                       ? Response::allow()
                       : Response::deny('You must be Authorized By Admin to View This Course.');
            }
            return true;
        });
    }
}
