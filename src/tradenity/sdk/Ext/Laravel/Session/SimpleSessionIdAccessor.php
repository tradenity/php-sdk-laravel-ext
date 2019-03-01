<?php
/**
 * Created by IntelliJ IDEA.
 * User: joseph
 * Date: 3/31/16
 * Time: 11:29 PM
 */

namespace Tradenity\SDK\Ext\Laravel\Session;

use Illuminate\Support\Facades\Session;
use Tradenity\SDK\SessionIdAccessor;

class SimpleSessionIdAccessor implements SessionIdAccessor
{

    function storeSessionId($id)
    {
        Session::set("auth_token", $id);
    }

    function getSessionId()
    {
        return Session::get("auth_token");
    }

    function reset()
    {
        Session::forget("auth_token");
    }

    function hasSessionId()
    {
        return Session::has("auth_token");
    }
}