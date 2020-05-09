<?php

namespace App;

use App\{Post , User};
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function owner()
    {
       return $this->belongsTo(User::class,'user_id');
    }

}
