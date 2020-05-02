@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex items-center justify-between">
        <a href="#" class="text-xl text-blue-700 font-semibold">
            Post
        </a>
    
        <a href="#" class="px-2 py-1 rounded-lg shadow-lg bg-blue-500 text-gray-100">
            Create Post
        </a>
    </div>
    <div class="flex items-center flex-wrap px-4 mt-16">
    @forelse ($posts as $post)
    <div class="w-1/4 px-10 my-4 py-6 bg-white rounded-lg shadow-md mx-4 h-56">
        <div class="flex justify-between items-center">
            <span class="font-light text-gray-600">{{ $post->created_at }}</span>
            <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">Laravel</a>
        </div>
        <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="{{ $post->path() }}">
                {{ $post->title }}
            </a>
            <p class="mt-2 text-gray-600">
                {{$post->body  }}
            </p>
        </div>
        <div class="flex justify-between items-center mt-4">
            <a class="text-blue-600 hover:underline" href="#">Read more</a>
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
@endsection