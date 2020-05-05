@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-2">
    <h2 class="text-gray-800 text-2xl py-3 border-b border-blue-300">
        {{ $profileUser->name }}
        <small> signed in {{ $profileUser->created_at->diffForHumans() }}</small>
    </h2>
    <div class="content mt-4 ">
        <h3 class="text-xl">Articles by {{ $profileUser->name }}:</h3>
        <ul class="mt-2 text-gray-800">
            @forelse ($profileUser->posts as $post)
                <li class="px-2 py-1 flex">
                    <svg width="26" height="26" viewBox="0 0 24 24" class="mx-1 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <a href="{{ route('posts.show',$post->id) }}" class="capitalize text-lg font-semibold">
                        {{ $post->title }}
                    </a>
                </li>
                @empty
                <div class=" bg-blue-300 rounded-md shadow-md " style="width:36rem;">
                    <div class="text-gray-800 flex mt-4 px-3 py-2">
                        <span class="text-2xl mt-4 tracking-wide">{{ $profileUser->name }} has no posts.</span>
                        <img src="{{ asset('images/art.svg') }}" alt="no_articles" class="w-64">
                    </div>
                </div>
            @endforelse
        </ul>
    </div>
</div>
@endsection
