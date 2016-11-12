<?php
/**
 * Created by IntelliJ IDEA.
 * User: joseph
 * Date: 7/23/16
 * Time: 5:29 PM
 */

namespace Tradenity\SDK\Ext\Laravel\Auth;

use Auth;
use Tradenity\SDK\Ext\Laravel\Auth\CustomerUserProvider;
use Illuminate\Support\ServiceProvider;

class CustomerAuthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('tradenity_customer', function($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            return new CustomerUserProvider();
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}