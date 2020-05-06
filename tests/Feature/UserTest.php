<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Database\Eloquent\Collection;
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

    /** @test */
    public function a_user_have_his_own_posts()
    {
       $user = create(User::class);
       
       $post = factory('App\Post')->create(['user_id'  => $user->id]);

       $this->assertInstanceOf(Collection::class,$user->posts);
    }
}
