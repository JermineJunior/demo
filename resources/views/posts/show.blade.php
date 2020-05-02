@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-4">
    <div class="flex items-center justify-between">
        <a href="#" class="text-xl text-blue-700 font-semibold">
            Post
        </a>
    
        <a href="#" class="px-2 py-1 rounded-lg shadow-lg bg-blue-500 text-gray-100">
            Create Post
        </a>
    </div>
    <div class="bg-white p-8 shadow rounded-lg w-128 justify-between mr-4 my-12">
    <div class="flex items-center">
        <h2 class="text-lg text-blue-700 mr-auto mb-2">
            <a href="{{ route('posts.show',$post->id) }}">
                {{ $post->title }}
            </a>
        </h2>
        <a href="#" class="-mt-24">
            <img src="{{ asset('images/follower07.jpg') }}" alt="avatar" class="rounded-full w-20 shadow border-2 border-white ">
        </a>
    </div>
    <div class="text-gray-500">
        {{ $post->body }}
    </div>
</div>
@endsection
