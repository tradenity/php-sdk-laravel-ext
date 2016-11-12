<?php

namespace Tradenity\SDK\Ext\Laravel\Config;

use Tradenity\SDK\Ext\Laravel\Session\SimpleSessionIdAccessor;
use Illuminate\Support\ServiceProvider;
use Tradenity\SDK\TradenityClient;

class TradenityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $sessionAccess = new SimpleSessionIdAccessor();
        if(config('tradenity.end_point')) {
            TradenityClient::$endPoint = config('tradenity.end_point');
        }
        TradenityClient::$key = config('tradenity.api_key');
        TradenityClient::$sessionIdAccessor = $sessionAccess;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
