@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-4">
    <div class="flex items-center justify-between px-6">
        <a href="#" class="text-xl text-blue-400 font-semibold">
            Post
        </a>

        <a href="#" class="px-2 py-1 rounded-lg shadow-lg bg-blue-500 text-gray-100">
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
                <svg viewBox="0 0 24 24" class="w-6 h-6 mr-1" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.31802 6.31802C2.56066 8.07538 2.56066 10.9246 4.31802 12.682L12.0001 20.364L19.682 12.682C21.4393 10.9246 21.4393 8.07538 19.682 6.31802C17.9246 4.56066 15.0754 4.56066 13.318 6.31802L12.0001 7.63609L10.682 6.31802C8.92462 4.56066 6.07538 4.56066 4.31802 6.31802Z" stroke="rgba(99, 179, 237)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="ml-auto">Like</span>
            </a>
            <div>
                <a class="flex items-center" href="{{ route('profile' , $post->users->name) }}">
                    <img class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=373&q=80" alt="avatar">
                    <h1 class="text-gray-700 font-bold">
                        {{ $post->users->name }}
                    </h1>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
