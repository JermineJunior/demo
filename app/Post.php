<?php

namespace App;

use App\{Comment,User};
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected static function boot()
	{
		parent::boot();

		static::deleting(function ($post) {
            $post->comments->each->delete();//remove post replies
        });

        static::creating(function ($post){
            $post->update(['slug',Str::slug($post->title)]);//add a slug to the path
            $post->owner->updatePostsCount($post);//update posts owner posts_count
        });
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return '/posts/'.$this->slug;
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

    public function addComment($attribuites)
    {
        $this->comments()->create($attribuites);
    }

    public function isownedBy($user)
    {
       return $this->user_id ==  auth()->id();    
    }
}
