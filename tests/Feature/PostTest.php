<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
     use RefreshDatabase;

     protected $post;
     protected function setUp(): void
     {
         parent::setUp();
         $this->post = create(Post::class);
     }
     
    /** @test */
    public function non_authinticated_users_can_not_view_post()
    {
       $this->get('/posts')
              ->assertStatus(302)
                   ->assertRedirect('/login');
    }
    
    /** @test */
    public function authinticated_users_can_view_project()
    {
        $this->signIn();

        $this->get('/posts')
            ->assertSee($this->post->title);
    }
    
    /** @test */
    public function an_authinticated_user_can_view_single_post()
    {
        $this->signIn();

        $this->get('/posts/'.$this->post->id)
            ->assertSee($this->post->title);
    }

}
