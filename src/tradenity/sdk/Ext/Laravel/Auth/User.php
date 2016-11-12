<?php

namespace Tradenity\SDK\Ext\Laravel\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Tradenity\SDK\Entities\Customer;

class User implements UserContract
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $username;
    public $password;
    
    public $rememberToken;

    public function __construct($customer)
    {
        $this->id = $customer->id;
        $this->firstName = $customer->firstName;
        $this->lastName = $customer->lastName;
        $this->email = $customer->email;
        $this->username = $customer->username;
        $this->password = $customer->password;
    }
   
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {        
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }
    
    public function getRememberTokenName()
    {
        return 'rememberToken';
    }

    public function toCustomer()
    {
        $c = new Customer();
        $c->id = $this->id;
        $c->firstName = $this->firstName;
        $c->lastName = $this->lastName;
        $c->email = $this->email;
        $c->username = $this->username;
        $c->password = $this->password;
        return $c;
    }

}
