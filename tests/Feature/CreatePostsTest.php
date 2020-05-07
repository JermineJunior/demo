<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostsTest extends TestCase
{
    use RefreshDatabase;
    
    protected $user;
    protected $post;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = create('App\User');
        $this->post = factory(Post::class)->make(['user_id' =>  $this->user->id]);
    }
    
    /** @test */
    public function guests_can_not_create_posts()
    {  
        $this->post('/posts',$this->post->toArray())
        ->assertStatus(302)
        ->assertRedirect('/login');
    }
}
