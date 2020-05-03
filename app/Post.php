<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body'];

    public function path()
    {
        return 'posts/'.$this->id;
    }
    
    public static function latest()
    {
        $latest = Post::find(Post::max('id'));
         
        return $latest;
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
   
}
