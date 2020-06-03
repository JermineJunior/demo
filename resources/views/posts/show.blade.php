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
    <div class="md:w-72 xl:w-custom px-6 my-4 pt-6 pb-4 bg-white rounded-lg shadow border mx-8 h-56 md:h-72">
        <div class="flex justify-between items-center">
            <span class="font-light text-gray-600 w-full">
                Published {{ $post->created_at->diffForHumans() }} by 
                <a class="items-center inline-flex" href="{{ route('profile' , $post->owner->name) }}">
                    {{ $post->owner->name }}
                </a>
            </span>
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
            @if (auth()->user()->can('update',$post))
                <div>
                    <a href="#" class="flex items-center text-gray-700">
                        Update 
                    </a>
                </div>
            @endif
        </div>
    </div>
    <div class="bg-white shadow-sm mx-8 rounded-md mb-2 overflow-hidden">
        <h4 class="px-10 py-2 text-gray-800">Comments:</h4> 
        @foreach ($post->comments as $comment)
        <div class="px-20 mt-2 py-2 mx-8 border-b -mx-6">
            <div class="text-gray-700 flex items-center justify-between">
                <p class="text-sm">{{ $comment->body }}</p>
                <small>by {{ $comment->owner->name }}</small>
            </div>
        </div>     
        @endforeach
        
        <div class='flex mt-6 mx-8 max-w-lg '>
            <form class='w-full max-w-xl bg-white rounded-lg px-3 py-2 mb-2' method="POST" action="{{ route('comment',$post->slug) }}">
                @csrf
                <div class='flex flex-wrap -mx-3 mb-6'>
                    <div class='w-full md:w-full px-3 mb-2'>
                        <textarea class='bg-gray-200 rounded-md leading-normal resize-y w-full h-20 py-2 px-3 focus:bg-white' id='grid-text-area-1' name="body" placeholder='Enter Your Comment' required></textarea>
                    </div>
                    <div class='w-full flex justify-end md:w-full px-3 my-1'>
                        <input type='submit' class='border border-blue-500 bg-blue-400 text-white hover:bg-blue-600 py-1 px-4 rounded tracking-wide mr-1 ' id='submit-2' value='Send'>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
