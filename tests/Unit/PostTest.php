<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\{ User,Post,Comment };
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
       parent::setUp();

       $this->user = create('App\User');
    }
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
      $post = factory(Post::class)->create(['user_id' =>  $this->user->id]);
      $this->assertEquals('posts/' . $post->id,$post->path());
   }

   /** @test */
   public function it_can_fetch_latest()
   {
      $post = factory(Post::class,3)->create(['user_id' =>  $this->user->id]);

      $latest = Post::latest();

      $this->get('/posts');
      $this->assertEquals(3,$latest->id);
   }

   /** @test */
   public function it_belongs_to_a_user()
   {
      $post = factory(Post::class)->create(['user_id' =>  $this->user->id]);
      
      $this->assertInstanceOf(User::class,$post->owner);
   }

   /** @test */
   public function it_has_associated_comments()
   {
      $post = factory(Post::class)->create(['user_id' =>  $this->user->id]);

      $comments = factory('App\Comment',2)->create(['user_id' =>  $this->user->id,'post_id' => $post->id]);

      $this->assertEquals(2,$post->comments->count());
   }

}
