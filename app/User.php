<?php

namespace App;

use App\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','posts_count'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts()
    {
      return $this->hasMany(Post::class);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }


    public function updatePostsCount($post,$update)
    {
        if($update == 'inc')
            User::where('id','=',$post->owner_id)->update(['posts_count'=> $post->owner->posts_count +=1]);
            
        else if($update == 'dec')
        User::where('id','=',$post->owner_id)->update(['posts_count'=> $post->owner->posts_count -=1]);
    }
   
}
