<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInPostTest extends TestCase
{
  use RefreshDatabase;
  protected $user;
  protected $post;
  
  protected function setUp(): void
  {
    parent::setUp();
    $this->user = create('App\User');
    $this->be($this->user);
    $this->post = factory('App\Post')->create(['user_id'  =>  $this->user->id]);
  }
  
  /** @test */
  public function guest_can_not_comment_on_posts()
  {
    $comment =  factory('App\Comment')
    ->make(['user_id' => $this->user->id ,'post_id' => $this->post->id]);
    
    $this->post($this->post->path().'/comment',$comment->toArray())
    ->assertStatus(302);                          
  }
  
  /** @test */
  public function an_authinticated_user_can_comment_on_posts()
  {
    $comment =  factory('App\Comment')
    ->make(['user_id' => $this->user->id ,'post_id' => $this->post->id]);
    
    $this->post($this->post->path().'/comment',$comment->toArray());
    
    $this->get($this->post->path())
    ->assertSee($comment->body);
  }
  
  /** @test */
  public function when_a_post_get_deleted_its_comments_are_deleted()
  {
    $this->signIn();
    $post = factory(Post::class)->make(['user_id' =>  $this->user->id]);
    $comment =  factory('App\Comment')
    ->make(['user_id' => $this->user->id ,'post_id' => $post->id]);
    
    $this->post($post->path().'/comment',$comment->toArray());
    
    $this->json('DELETE',$post->path());
    
    $this->assertDatabaseMissing('posts',$post->toArray());
    $this->assertDatabaseMissing('comments',$comment->toArray());
  }
}
