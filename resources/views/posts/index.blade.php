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
                <div class="flex items-center">
                    <a class="text-blue-600 flex items-center mr-auto" href="#">
                        <svg class="w-6 h-6 mr-1 fill-current text-blue-600" viewBox="0 0 20 20"  xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 5V13C18 14.1046 17.1046 15 16 15H11L6 19V15H4C2.89543 15 2 14.1046 2 13V5C2 3.89543 2.89543 3 4 3H16C17.1046 3 18 3.89543 18 5ZM7 8H5V10H7V8ZM9 8H11V10H9V8ZM15 8H13V10H15V8Z"/>
                        </svg>
                        <span class="ml-auto">
                            {{ $post->comments->count() }}
                        </span>
                    </a>
                    <a class="text-blue-600 hover:text-blue-400 ml-4" href="{{ $post->path() }}">Read more</a>
                </div>
                <div>
                    <a class="flex items-center" href="{{ route('profile', $post->owner->name) }}">
                        <h1 class="text-gray-700 font-bold">{{ $post->owner->name }}</h1>
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
                <a class="py-1 font-semibold text-lg text-gray-800 tracking-wide uppercase" href="{{ route('posts.show',$latest->id) }}">
                    {{ $latest->title }}
                </a>
            </div>
            <div class="mt-4">
                <a class="text-sm text-gray-700 font-medium" href="#"">
                    {{ $latest->body }}
                </a>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                    <a class="text-gray-700 font-medium text-sm py-1" href="{{ route('profile',$latest->owner->name) }}">By {{ $latest->owner->name }}</a>
                </div>
                <span class="font-light text-sm text-gray-600">{{ $latest->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection