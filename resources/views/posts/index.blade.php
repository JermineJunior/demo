@extends('layouts.app')

@section('content')
<div class="flex justify-between container mx-auto">
  <div class="">
    <div class="items-center flex-wrap px-4 mt-8 mr-4">
        @forelse ($posts as $post)
        <div class="w-full px-10 my-4 py-6 bg-white rounded-lg shadow-md mx-4 h-56 md:h-72">
            <div class="flex justify-between items-center">
                <span class="font-light text-gray-600">Posted {{ $post->created_at->diffForHumans() }}</span>
                <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">Laravel</a>
            </div>
            <div class="mt-2">
                <a class="text-2xl text-gray-700 font-bold hover:text-gray-600 capitalize" href="#">
                    {{ $post->title }}
                </a>
                <p class="mt-2 text-gray-600">
                    {{$post->body  }}
                </p>
            </div>
            <div class="flex justify-between items-center mt-4">
                <a class="text-blue-600 hover:underline" href="{{ $post->path() }}">Read more</a>
                <div>
                    <a class="flex items-center" href="{{ route('profile', $post->users->name) }}">
                        <h1 class="text-gray-700 font-bold">{{ $post->users->name }}</h1>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <span class="text-red-400">
            Sorry No posts yet.
        </span>
        @endforelse
        {{ $posts->links('vendor.pagination.semantic-ui') }}
        </div>
    </div>
    <div class="side">
       
        <div class="flex flex-col bg-white px-8 py-6 max-w-md rounded-lg shadow-md xl:w-128 mt-8 md:w-72 md:mr-3">
            <div class="flex justify-center items-center">
                <a class="px-2 py-1 bg-gray-600 text-lg text-gray-100 rounded hover:bg-gray-400" href="#">
                    Authors
                </a>
            </div>
            <ol class="py-3 px-2 mt-4 text-gray-800 text-lg">
                @foreach ($users as $user)
                    <li>
                        <a href="{{ route('profile',$user->name) }}">
                            {{ $user->name }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
        <div class="flex flex-col bg-white px-8 py-6 max-w-md rounded-lg shadow-md xl:w-128 mt-12 md:w-72 md:mr-3">
            <div class="flex justify-center items-center">
                <a class="px-2 py-1 bg-gray-600 text-lg text-gray-100 rounded" href="#">
                    Recent Post
                </a>
            </div>
            <div class="mt-6">
                <a class="px-2 py-1  text-lg text-gray-800 border-b tracking-wide border-blue-400" href="{{ route('posts.show',$latest->id) }}">
                    {{ $latest->title }}
                </a>
            </div>
            <div class="mt-4">
                <a class="text-lg text-gray-700 font-medium" href="#"">
                    {{ $latest->body }}
                </a>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                    <a class="text-gray-700 text-sm mx-3" href="{{ route('profile',$latest->users->name) }}">{{ $latest->users->name }}</a>
                </div>
                <span class="font-light text-sm text-gray-600">{{ $latest->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection