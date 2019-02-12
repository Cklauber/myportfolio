<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Auth\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Set the currently logged in user for the application or create a new one and sign in.
     *
     * @param  \Illuminate\Foundation\Auth\User  $user
     * @return $this
     */
    public function signIn($user = null)
    {
        return $this->actingAs($user ?: factory('App\User')->create());
    }

    /**
    * Sign in as the admin of the application.
    *
    * @return $this
    */
    public function beAdmin()
    {
        return $this->be(User::first());
    }
}
