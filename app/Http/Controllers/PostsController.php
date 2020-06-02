<?php

namespace App\Http\Controllers;

use App\{User,Post};
use App\Http\Requests\StoreBlogPost;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(4);
  
        $users = User::where('posts_count','>','0')->get();

        $latest = Post::latest();
      
       return view('posts.index',compact('posts','latest','users')); 
       
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StoreBlogPost $form , Post $post)
    {
       return $form->persist($post);
    }

    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return view('posts.index');
    
    }
}
