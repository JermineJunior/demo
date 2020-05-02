<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');
        
        $this->actingAs($user);

        return $this;
    }

    protected function create($class,$attr = [])
    {
      return factory($class,$attr)->create();
    }

    protected function make($class,$attr = [])
    {
      return factory($class,$attr)->make();
    }
   
    protected function raw($class,$attr = [])
    {
        return factory($class,$attr)->raw();
    }
}
