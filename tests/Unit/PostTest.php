<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\{ User,Post };
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
class PostTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
   public function posts_db_has_the_expected_coulmns()
   {
      $this->assertTrue( 
         Schema::hasColumns('posts', [
           'id','user_id','title', 'body'
       ]), 1);
   }
   
   /** @test */
   public function it_has_a_path()
   {
      $user = create('App\User');
      $post = factory(Post::class)->create(['user_id' =>  $user->id]);
      $this->assertEquals('posts/' . $post->id,$post->path());
   }

   /** @test */
   public function it_can_fetch_latest()
   {
      $user = create('App\User');
      $post = factory(Post::class,3)->create(['user_id' =>  $user->id]);

      $latest = Post::latest();

      $this->get('/posts');
      $this->assertEquals(3,$latest->id);
   }

   /** @test */
   public function a_post_belongs_to_a_user()
   {
      $user = create('App\User');
      $post = factory(Post::class)->create(['user_id' =>  $user->id]);
      

      $this->assertInstanceOf(User::class,$post->users);
   }

}
