<?php

namespace App\Providers;

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
    public function boot()
    {
        $this->registerPolicies();

        // Gateの登録
        // 設定した権限でその処理を行うことができる/できないの設定は、Gateで制御する。
        
        Gate::define('user', function ($user) {
            return $user->access_auth == '0';
        });
        Gate::define('manager', function ($user) {
            return $user->access_auth == '1';
        });
        Gate::define('admin', function ($user) {
            return $user->access_auth == '9';
        });
    }
}
