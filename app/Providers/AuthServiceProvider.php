<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin',function($user)
        {
            if($user->role=='admin')
                return true;
            else
            {
                return false;

            }


        }
        );

        Gate::define('user',function($user)
        {
            if($user->role=='user')
                return true;
            else
            {
                return false;

            }


        }
        );
        Gate::define('ceo',function($user)
        {
            if($user->role=='ceo')
                return true;
            else
            {
                return false;

            }


        }
        );
        Gate::define('cfo',function($user)
        {
            if($user->role=='cfo')
                return true;
            else
            {
                return false;

            }


        }
        );




        //
    }
}
