<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Post $post,Comment $comment)
    {
       $post->addComment([
            'body'      =>  request('body'),
            'user_id'   => auth()->id(),
            'post_id'   =>  $post->id
       ]);

       return back();
    }
 
}
