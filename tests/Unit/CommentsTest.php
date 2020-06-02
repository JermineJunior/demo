<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\{Comment,User,Post};
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsTest extends TestCase
{
  use RefreshDatabase;
  protected $user;
  protected $post;
  
  protected function setUp(): void
  {
    parent::setUp();
    $this->user = create('App\User');
    $this->post = factory(Post::class)->create(['user_id' => $this->user->id]);
  }
  
  /** @test */
  public function it_has_an_owner()
  {
    $comment = factory(Comment::class)->create(['user_id' =>  $this->user->id,'post_id' => $this->post->id]);
    
    $this->assertInstanceOf(User::class,$comment->owner);
  }
  
  /** @test */
  public function it_gets_deleted_with_the_associated_post()
  {
    $comment = factory(Comment::class)->create(['user_id' =>  $this->user->id,'post_id' => $this->post->id]);
    
    $this->post->delete();
    
    $this->assertDatabaseMissing('comments',$comment->toArray());
  }
  
}
