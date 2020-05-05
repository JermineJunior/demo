<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_create_posts()
    {
        $user = create('App\User');
        $post = factory(Post::class)->make(['user_id' =>  $user->id]);

        $this->post('/posts',$post->toArray())
                   ->assertStatus(302)
                    ->assertRedirect('/login');
    }
}
