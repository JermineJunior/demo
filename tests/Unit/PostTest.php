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
      $post = create(Post::class);
      $this->assertEquals('posts/' . $post->id,$post->path());
   }
}
