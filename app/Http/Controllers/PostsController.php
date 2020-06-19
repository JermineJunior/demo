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
        $posts = $posts = Post::latest()->get();
        
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
        $form->persist($post);
        
        return redirect()->route('posts.index');
    }
    
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }
    
    public function update(StoreBlogPost $form,Post $post)
    {
        $form->update(request(['title','body']),$post);
        
        return redirect()->route('posts.index');
    }
    
    public function destroy(Post $post)
    {
        if($post->user_id != auth()->id()){
            if (request()->wantsJson()) return response(["status" =>  "you are not authorized"],403);
            return redirect('/login',403);
        }
        $post->delete();
        if (request()->wantsJson()) return response([],204);
        
        return redirect()->route('posts.index');
        
    }
    
    public function filterPosts(User $username)
    {
        $posts = Post::where('user_id',$username->id);
        
        $posts = $posts->get();
        return view('posts.index',compact('posts'));
    }
}
