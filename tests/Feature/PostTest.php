<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    protected $post;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        $user = create('App\User');
        $this->post = factory(Post::class)->create(['user_id' =>  $user->id]);
    }
    
    /** @test */
    public function guests_can_not_view_post()
    {
        $this->withExceptionHandling();
        
        $this->get('/posts')
        ->assertStatus(302)
        ->assertRedirect('/login');
    }
    
    /** @test */
    public function authinticated_users_can_view_posts()
    {
        $this->signIn();
        
        $this->get('/posts')
        ->assertSee($this->post->title)
        ->assertSee($this->post->body);
    }
    
    /** @test */
    public function an_authinticated_user_can_view_single_post()
    {
        $this->signIn();
        
        $this->get($this->post->path())
        ->assertSee($this->post->title)
        ->assertSee($this->post->body);
    }
    
    /** @test */
    public function an_authinticated_user_can_read_post_comments()
    {
        $this->signIn();
        
        $user = create('App\User');
        
        $comment =  factory('App\Comment')
        ->create(['user_id' => $user->id ,'post_id' => $this->post->id]);
        
        $this->get($this->post->path())
        ->assertSee($comment->body);
    }

    /**  */
    public function a_user_can_filter_posts_by_user_name()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $userPost = factory(Post::class)->create(['user_id'  => auth()->id()]);
        $anotherPost = factory(Post::class)->create(['user_id'  =>  1]);

        $this->get("/posts/{$user->name}")
              ->assertSee($userPost->title)
                ->assertDontSee($anotherPost->title);
    }
    
}
