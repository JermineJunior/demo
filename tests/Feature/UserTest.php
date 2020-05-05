<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_has_a_profile()
    {
       $user = create(User::class);

       $this->get("/profiles/{$user->name}")
                    ->assertSee($user->name);

    }
}