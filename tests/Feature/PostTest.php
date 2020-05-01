<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
     use RefreshDatabase;
     
    /** @test */
    public function non_authinticated_users_can_not_view_post()
    {
       $this->get('/post')
              ->assertStatus(302);
    }
}
