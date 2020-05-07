<?php

namespace App\Http\Controllers;

use App\{User,Post};
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        $posts = Post::latest()->paginate(4);
  
        $users = User::all();

        $latest = Post::latest();

       return view('posts.index',compact('posts','latest','users')); 
       
    }

  
    public function create()
    {
        return view('posts.create');
    }

 
    public function store(StoreBlogPost $request)
    {
        $validated = $request->validated();

        $post =  Post::create([ 
            'user_id' => request('user_id'), 
            'title' => request('title') ,
            'body'  =>  request('body')
        ]);

        return redirect($post->path());
    }

  
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

   
    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
