<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
class PostTest extends TestCase
{
    use RefreshDatabase;


   /** @test */
   public function it_has_a_path()
   {
      $post = create('App\Post');
      $this->assertEquals('post/'.$post->id,$post->path());
   }
}
