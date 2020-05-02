@extends('layouts.app')

@section('content')
<div class="flex justify-between container mx-auto">
    <div class="">
        <div class="flex items-center justify-between px-4">
            <a href="#" class="text-xl text-blue-400 font-semibold">
                Post
            </a>
        
            <a href="#" class="px-2 py-1 rounded-lg shadow-lg bg-blue-500 text-gray-100">
                Create Post
            </a>
        </div>
        <div class="flex items-center flex-wrap px-4 mt-16">
        @forelse ($posts as $post)
        <div class="w-full px-10 my-4 py-6 bg-white rounded-lg shadow-md mx-4 h-56 md:h-72">
            <div class="flex justify-between items-center">
                <span class="font-light text-gray-600">Posted{{ $post->created_at->diffForHumans() }}</span>
                <a class="px-2 py-1 bg-blue-500 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">Laravel</a>
            </div>
            <div class="mt-2">
                <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">
                    {{ $post->title }}
                </a>
                <p class="mt-2 text-gray-600">
                    {{$post->body  }}
                </p>
            </div>
            <div class="flex justify-between items-center mt-4">
                <a class="text-blue-600 hover:underline" href="{{ $post->path() }}">Read more</a>
                <div>
                    <a class="flex items-center" href="#">
                        <h1 class="text-gray-700 font-bold">{{ auth()->user()->name }}</h1>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <span class="text-red-400">
            Sorry No posts yet.
        </span>
        @endforelse
        </div>
    </div>
    <div class="side">
        <div class="flex flex-col bg-white px-8 py-6 max-w-md rounded-lg shadow-md h-64 w-128 mt-32">
            <div class="flex justify-center items-center">
                <a class="px-2 py-1 bg-blue-500 text-sm text-gray-100 rounded hover:bg-gray-500" href="#">
                    Authors
                </a>
            </div>
        </div>
        <div class="flex flex-col bg-white px-8 py-6 max-w-md rounded-lg shadow-md h-64 w-128 mt-12">
            <div class="flex justify-center items-center">
                <a class="px-2 py-1 bg-blue-500 text-sm text-gray-100 rounded hover:bg-gray-500" href="#">
                    {{ $latest->title }}
                </a>
            </div>
            <div class="mt-4">
                <a class="text-lg text-gray-700 font-medium hover:underline" href="#">
                    {{ $latest->body }}
                </a>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                    <a class="text-gray-700 text-sm mx-3 hover:underline" href="#">Jermine Junior</a>
                </div>
                <span class="font-light text-sm text-gray-600">{{ $latest->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection