@extends('layouts.app')

@section('content')
<div class="bg-white max-w-full rounded overflow-hidden shadow-lg mx-8 my-2">
    <div class="border-b">
        <!-- First list item -->
        <div class="px-6 py-3 flex items-center justify-between"> 
            <div class="pl-3">
                <h3 class="text-lg font-semibold">
                    {{ $profileUser->name }}
                </h3>
                <a href="#" class="text-sm block text-gray-800">
                    {{ $profileUser->email }}
                </a>
                <small class="text-sm text-gray-600">
                    Joined {{ $profileUser->created_at->diffForHumans() }}
                </small>
            </div>
            <div class="">
                <img class="shadow w-10 h-10 object-cover rounded-full mx-4" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=731&q=80" alt="avatar">
            </div>
        </div>
    </div>
    <div class="mb-4">
        <!-- First list item -->
        @if ($profileUser->can('update',$profileUser))
        <div class="px-6 py-4 text-center w-64 md:w-full md:flex md:items-center md:justify-center">
            <a href="#" class="border border-gray-600 rounded py-2 px-4 text-xs font-semibold text-gray-70 flex items-center shadow">
                <svg  class="w-6 h-6 pr-1 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.2322 5.23223L18.7677 8.76777M16.7322 3.73223C17.7085 2.75592 19.2914 2.75592 20.2677 3.73223C21.244 4.70854 21.244 6.29146 20.2677 7.26777L6.5 21.0355H3V17.4644L16.7322 3.73223Z" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Edit Your profile.
            </a>
        </div>
        @endif
    </div>
    {{-- <div class="content my-4 mx-4">
        <h3 class="text-xl">Posts by {{ $profileUser->name }}:</h3>
        <div class="mt-2 text-gray-800 flex flex-wrap">
            @forelse ($profileUser->posts as $post)
            <div class="px-2 w-1/3 py-1 flex">
                <a href="{{ route('posts.show',$post->slug) }}" class="capitalize text-lg font-semibold">
                    {{ $post->title }}
                </a>
            </div>
            @empty
            <div class=" bg-blue-300 rounded-md shadow-md" style="width:36rem;">
                <div class="text-gray-800 flex mt-4 px-3 py-2">
                    <span class="text-2xl mt-4 tracking-wide">{{ $profileUser->name }} has no posts.</span>
                    <img src="{{ asset('images/art.svg') }}" alt="no_articles" class="w-64">
                </div>
            </div>
            @endforelse
        </div> --}}
    </div>
</div>
@endsection
