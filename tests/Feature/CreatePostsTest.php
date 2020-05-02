<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_create_posts()
    {
        $post = $this->make('App\Post');

        $this->post('/posts',$post->toArray())
                   ->assertStatus(302)
                    ->assertRedirect('/login');
                      
    }

   /** @test */
   public function an_authinticated_user_can_create_posts()
   {
      $this->signIn();

      $post = $this->make('App\Post');

      $this->post('/posts',$post->toArray());
                    
      $this->get($post->path())
            ->assertSee($post->title)
                ->assertSee($post->body);      

   }
}
