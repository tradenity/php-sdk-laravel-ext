<?php

namespace Tradenity\SDK\Ext\Laravel\Config;

use Tradenity\SDK\Ext\Laravel\Session\SimpleSessionIdAccessor;
use Illuminate\Support\ServiceProvider;
use Tradenity\SDK\ApiClient;

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
            ApiClient::$apiEndPoint = config('tradenity.end_point');
        }
        ApiClient::$ApiKey = config('tradenity.api_key');
        ApiClient::$sessionIdAccessor = $sessionAccess;
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
