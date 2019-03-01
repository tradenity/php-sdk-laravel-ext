<?php

namespace Tradenity\SDK\Ext\Laravel\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Tradenity\SDK\Resources\Customer;

class User implements UserContract
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $username;
    public $password;
    
    public $rememberToken;

    public function __construct(Customer $customer)
    {
        $this->id = $customer->getId();
        $this->firstName = $customer->getFirstName();
        $this->lastName = $customer->getLastName();
        $this->email = $customer->getEmail();
        $this->username = $customer->getUsername();
        $this->password = $customer->getPassword();
    }
   
    public function getUsername()
    {
        return $this->username;
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
        return new Customer([
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password
        ]);
    }

}
