<?php

namespace App;

use App\{Comment,User};
    
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function path()
    {
        return 'posts/'.$this->id;
    }
    
    public function addPost($post)
    {
       $this->create($post); 
    }
    public static function latest()
    {
        $latest = Post::find(Post::max('id'));
         
        return $latest;
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
   
}
