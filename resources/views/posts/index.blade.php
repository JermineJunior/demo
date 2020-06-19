@extends('layouts.app')

@section('content')
<div class="px-6 py-8">
    <div class="flex items-center justify-between px-6 mr-3 md:mr-8">
        <a href="#" class="text-xl text-blue-400 font-semibold ">
            Post
        </a>
        <a href="/posts/create" class="px-2 py-1 rounded-lg shadow-lg bg-blue-500 text-gray-100">
            Create Post
        </a>
    </div>
    <div class="flex justify-between container mx-auto">
        <div class="w-full lg:w-8/12">
            <div class="items-center flex-wrap px-4 mt-8 mr-4">
                @forelse ($posts as $post)
                <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md mb-4">
                    <div class="flex justify-between items-center">
                        <span class="font-light text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
                        <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">Laravel</a>
                    </div>
                    <div class="mt-2">
                        <h3 class="text-xl text-gray-700 font-bold capitalize">{{ $post->title }}</h3>
                        <p class="mt-2 text-gray-600">{{ $post->body }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        {{-- <a class="text-blue-500 hover:underline" href="{{ route('posts.show',$post->slug) }}">Read more</a> --}}
                        <div>
                            <a class="flex items-center" href="{{ route('profile',$post->owner->name) }}">
                                <h1 class="text-gray-700 font-bold hover:underline">{{ $post->owner->name }}</h1>
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
        <div class="-mx-8 w-4/12 hidden lg:block mr-4">
            <div class="px-8">
                <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                <div class="flex flex-col bg-white max-w-sm px-6 py-4 mx-auto rounded-lg shadow-md">
                    <ul class="-mx-4">
                        @foreach ($users as $user)
                        <li class="flex items-center mt-2">
                            <img class="w-10 h-10 object-cover rounded-full mx-4" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=731&q=80" alt="avatar">
                            <p>
                                <a class="text-gray-700 font-bold mx-1 hover:underline" href="{{ route('profile',$user->name) }}">{{ $user->name }}</a>
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- end authors -->
            <div class="mt-10 px-8">
                <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
                <div class="flex flex-col bg-white px-8 py-6 max-w-sm mx-auto rounded-lg shadow-md">
                    <div class="flex justify-center items-center">
                        <a class="px-2 py-1 bg-gray-600 text-sm text-green-100 rounded hover:bg-gray-500" href="#">Laravel</a>
                    </div>
                    <div class="mt-4">
                        <a class="text-lg text-gray-700 font-medium hover:underline" href="{{ route('posts.show',$latest->slug) }}">{{ $latest->body }}</a>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=731&q=80"
                            class="w-8 h-8 object-cover rounded-full" alt="avatar">
                            <a class="text-gray-700 text-sm mx-3 hover:underline" href="{{ route('profile',$latest->owner->name) }}">{{ $latest->owner->name }}</a>
                        </div>
                        <span class="font-light text-sm text-gray-600">{{ $latest->created_at }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection