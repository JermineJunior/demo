<?php

namespace App\Http\Controllers;

use App\{User,Post};
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        $posts = Post::all();
  
        $users = User::all();

        $latest = Post::latest();

       return view('posts.index',compact('posts','latest','users')); 
       
    }

  
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        $post =  Post::create([
             'title' =>  request('title'),
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
