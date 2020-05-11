<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
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

    /** @test */
    public function it_requires_a_title()
    {
        $this->signIn();
        
        $post = factory('App\Post')->make(['title' => null]);
        
        $this->post('/posts',$post->toArray())
        ->assertSessionHasErrors('title');
        
        $post = factory('App\Post')->make(['title' => 1]);
        
        $this->post('/posts',$post->toArray())
        ->assertSessionHasErrors('title');
    }
    
    /** @test */
    public function it_requires_a_body()
    {
        $this->signIn();
        
        $post = factory('App\Post')->make(['body' => null]);
        
        $this->post('/posts',$post->toArray())
        ->assertSessionHasErrors('body');
    }
    
    /** @test */
    public function authinticated_users_can_create_posts()
    {
        $this->signIn();
        
        $this->post('/posts',$this->post->toArray());
        
        $this->get('/posts/')
          ->assertSee($this->post->title)
          ->assertSee($this->post->body);
        
    }

    /** @test */
    public function it_can_be_deleted()
    {
        $this->signIn();

        $this->post('/posts',$this->post->toArray());

        $this->delete('/posts',$this->post->toArray());

        $this->assertDatabaseMissing('posts',$this->post->toArray());
    }
}
