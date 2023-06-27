<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Braintree_Configuration;
use Braintree\Configuration;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //check that app is local
        // if ($this->app->isLocal()) {
        //     //if local register your services you require for development
        //     $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        // } else {
        //     //else register your services you require for production
        //     $this->app['request']->server->set('HTTPS', true);
        // }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if (env('APP_ENV') === 'development') {
        //     URL::forceScheme('https');
        // }
        Configuration::environment(env('BRAINTREE_ENV'));
        Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
        Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
        Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));
    }
}
