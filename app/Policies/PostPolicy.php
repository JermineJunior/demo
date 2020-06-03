<?php

namespace App\Policies;

use App\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    /**
    * Determine if the given post can be updated by the user.
    *
    * @param  \App\Post  $post
    * @return bool
    */
    
    public function update($post)
    {
        return $post->user_id  ===  auth()->id()
        ? Response::allow()
        : Response::deny('You do not own this post.');
    }
}
