@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-4">
    <div class="flex items-center justify-between px-6">
        <a href="#" class="text-xl text-blue-400 font-semibold">
            Post
        </a>
        <a href="/posts/create" class="px-2 py-1 rounded-lg shadow-lg bg-blue-500 text-gray-100">
            Create Post
        </a>
    </div>
    <div class="md:w-72 xl:w-custom px-6 my-4 pt-6 pb-4 bg-white rounded-lg shadow border mx-8 h-56 md:h-72">
        <div class="flex justify-between items-center">
            <span class="font-light text-gray-600 w-full">
                Published {{ $post->created_at->diffForHumans() }} by 
                <a class="items-center inline-flex" href="{{ route('profile' , $post->owner->name) }}">
                    {{ $post->owner->name }}
                </a>
            </span>
            @if ($post->ownedBy(auth()->user()))
            <div>
                <form action="{{ $post->path() }}" method="POST">
                    @csrf
                    @method('DELETE')
                      <input type='submit' class='appearance-none block w-full bg-white text-blue-600 font-bold uppercase rounded-lg py-3 px-4 hover:underline focus:outline-none focus:bg-white focus:border-gray-500 text-center cursor-pointer' value='Delete'>
                  </form>
            </div>
            @endif
        </div>
        <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="{{ $post->path() }}">
                {{ $post->title }}
            </a>
            <p class="mt-2 text-gray-600">
                {{ $post->body }}
            </p>
        </div>
        <div class="flex justify-between items-center mt-4">
            <a class="text-blue-600 flex items-center" href="#">
                <svg class="w-6 h-6 mr-1 fill-current text-blue-600" viewBox="0 0 20 20"  xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 5V13C18 14.1046 17.1046 15 16 15H11L6 19V15H4C2.89543 15 2 14.1046 2 13V5C2 3.89543 2.89543 3 4 3H16C17.1046 3 18 3.89543 18 5ZM7 8H5V10H7V8ZM9 8H11V10H9V8ZM15 8H13V10H15V8Z"/>
                </svg>
                <span class="ml-auto">
                    {{ $post->comments->count() }}
                </span>
            </a>
            @if ($post->ownedBy(auth()->user()))
                <div>
                    <a href="{{ route('posts.edit',$post) }}" class="flex items-center text-gray-700">
                        Update 
                    </a>
                </div>
            @endif
        </div>
    </div>
    <div class="bg-white shadow-sm mx-8 rounded-md mb-1 overflow-hidden">
        <h2 class="px-6 py-3 text-gray-800">Comments:</h2>
        @foreach ($post->comments as $comment)
        <div class="px-20 mt-2 py-2 mx-8 border-b -mx-6">
            <div class="text-gray-700 flex items-center">
                <div class="mr-1 mb-6">
                    <img class="w-10 h-10 object-cover rounded-full mx-4" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=731&q=80" alt="avatar">
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold">
                        {{ $comment->owner->name }}
                    </h3>
                    <p class="mt-2 text-gray-700">
                        {{ $comment->body }}
                    </p>
                    <small class="text-xs text-gray-600">{{ $comment->created_at->diffForHumans() }} .Reply</small>
                </div>
            </div>
        </div>     
        @endforeach
        
        <div class='flex mt-6 mx-8 max-w-lg '>
            <form class='w-full max-w-xl bg-white rounded-lg px-3 py-2 mb-2' method="POST" action="{{ route('comment',$post->slug) }}">
                <h4 class="px-4 -ml-4 pb-3 pt-1 text-gray-800">Add a new comment</h4> 
                @csrf
                <div class='flex flex-wrap -mx-3 mb-6'>
                    <div class='w-full md:w-full px-3 mb-2'>
                        <textarea class='bg-gray-100 rounded-md border leading-normal resize-none w-full h-20 py-2 px-3 shadow-inner font-medium placeholder-gray-700 focus:outline-none focus:bg-white' name="body" placeholder='Type Your Comment' required></textarea>
                    </div>
                    <div class='w-full flex items-center justify-between md:w-full px-3 my-1'>
                        <div class="flex items-center w-1/2 text-gray-700 px-2">
                            <svg fill="none" class="w-6 h-6 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                           <p class="text-sm">Some HTML is okay.</p>
                        </div>
                        <input type='submit' class='bg-white  text-gray-600 py-1 px-4 rounded border border-gray-400  tracking-wide mr-1 hover:bg-gray-100 ' id='submit-2' value='Post Comment'>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
