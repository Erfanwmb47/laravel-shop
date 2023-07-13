<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Order;
use App\Models\Permission;
use App\Models\User;
use App\Policies\OrderPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        //User::class => UserPolicy::class,
        Order::class => OrderPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function ($user){
            if($user->is_superUser())
                return true;
        });

        foreach (Permission::all() as $permission){
            Gate::define($permission->name,function ($user) use ($permission){
                return $user->hasPermission($permission);
            });

            //dd($permission);
        }
        $this->registerPolicies();
       /* Gate::define('edit-user',function ($user,$currentUser){
            return $user->id == $currentUser->id;
        });*/



        //
    }
}
