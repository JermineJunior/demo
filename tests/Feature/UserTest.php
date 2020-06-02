<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\{User,Post};
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
   use RefreshDatabase;
   
   /** @test  */
   public function users_database_has_expected_columns()
   {
      $this->assertTrue( 
         Schema::hasColumns('users', [
            'id','name', 'email', 'email_verified_at', 'password'
            ]), 1);
         }
         
         /** @test */
         public function a_user_has_a_profile()
         {
            $user = create(User::class);
            
            $this->get("/profiles/{$user->name}")
            ->assertSee($user->name);
         }
         
         /** @test */
         public function a_user_have_many_posts()
         {
            $user = create(User::class);
            
            $post = factory('App\Post')->create(['user_id'  => $user->id]);
            
            $this->assertEquals(1, $user->posts->count()); 
         }
         
         /** @test */
         public function only_profile_owner_can_update_profile()
         {
            $user = create(User::class);
            
            $this->get("/profiles/{$user->name}")
            ->assertDontSee(' Edit Your account.');
            
            $this->actingAs($user);
            
            $this->get("/profiles/{$user->name}")
            ->assertSee(' Edit Your account.');
            
         }
         
         /** @test */
         public function users_has_articles_count()
         {
            $user = create(User::class);
            
            $this->actingAs($user);
            
            $post = factory(Post::class)->create(['user_id' =>  $user->id]);
            
            $this->assertEquals(1,$post->owner->posts_count);
            
         }
      }
      