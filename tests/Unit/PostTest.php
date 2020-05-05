<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class PostTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
   public function it_has_a_path()
   {
      $user = create('App\User');
      $post = factory(Post::class)->create(['user_id' =>  $user->id]);
      $this->assertEquals('posts/' . $post->id,$post->path());
   }
}
