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
    <div class="md:w-72 xl:w-custom px-6 my-4 py-6 bg-white rounded-lg shadow-md mx-8 h-56 md:h-72">
        <div class="flex justify-between items-center">
            <span class="font-light text-gray-600">Published {{ $post->created_at->diffForHumans() }}</span>
            <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">PHP</a>
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
            <div>
                <a class="flex items-center" href="{{ route('profile' , $post->owner->name) }}">
                    <img class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=373&q=80" alt="avatar">
                    <h1 class="text-gray-700 font-bold">
                        {{ $post->owner->name }}
                    </h1>
                </a>
            </div>
        </div>
    </div>
    <div class="">
        @foreach ($post->comments as $comment)
        <div class="px-6 my-4 py-6 bg-white rounded-lg shadow mx-8">
            <div class="mt-2 text-gray-700 flex items-center justify-between">
                <p class="text-sm">
                    {{ $comment->body }}
                </p>
                <a href="#" class="text-blue-600 pt-1o">
                    By  {{ $comment->owner->name }}
                </a>
            </div>
        </div>
        @endforeach
        
        <div class='flex my-2 border mx-8 max-w-lg'>
            <form class='w-full max-w-xl bg-white rounded-lg px-3 py-2' method="POST" action="{{ route('comment',$post->id) }}">
                @csrf
                <div class='flex flex-wrap -mx-3 mb-6'>
                    <div class='w-full md:w-full px-3 mb-6'>
                        <textarea class='appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-text-area-1' name="body" placeholder='Enter Your Comment' required></textarea>
                    </div>
                    <div class='w-full md:w-1/4 px-3 mb-2'>
                        <input type='submit' class='appearance-none block w-full bg-blue-400 text-gray-200 font-bold uppercase border border-gray-200 rounded-lg py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-center cursor-pointer' id='submit-2' value='Send'>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
