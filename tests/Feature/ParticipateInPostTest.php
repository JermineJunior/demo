<?php

namespace Tests\Feature;

use Tests\TestCase;
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
}
