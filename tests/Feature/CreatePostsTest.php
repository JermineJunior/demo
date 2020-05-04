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
        $post = $this->make(Post::class);

        $this->post('/posts',$post->toArray())
                   ->assertStatus(302)
                    ->assertRedirect('/login');
    }

   /** @test */
   public function an_authinticated_user_can_create_posts()
   {
      $this->signIn();

      $post = $this->make(Post::class);

      $this->post('/posts',$post->toArray());

      $this->get($post->path())
          ->assertStatus(200)
            ->assertSee($post->title)
                ->assertSee($post->body);
               
   }
}
