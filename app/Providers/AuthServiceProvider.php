<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        
    ];

    public function boot(): void
    {
        //para que el token solo dure 3 hora
        Passport::personalAccessTokensExpireIn(now()->addHours(3));
    }
}
