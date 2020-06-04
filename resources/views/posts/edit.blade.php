@extends('layouts.app')

@section('content')
<div class='flex justify-center my-2'>
    <form class='w-full max-w-xl bg-white rounded-lg p-6' method="POST" action="/posts/{{ $post->slug }}">
        @csrf
        @method('PUT')
        <div class='flex flex-wrap -mx-3 mb-6'>
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Post Title</label>
                <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-text-1' type='text' name="title" value="{{ $post->title }}" placeholder='Enter Post Title'  required>
            </div>
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-area-3'>Post body</label>
                <textarea class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-text-area-3' cols="15" name="body" placeholder='Enter Post body' required> {{ $post->body }}</textarea>
            </div>
            <div class='w-full md:w-1/3 md:flex items-center px-3 mb-6'>
                <input type='submit' class='appearance-none block w-full bg-blue-500 text-gray-100 font-bold uppercase border border-gray-200 rounded-lg py-3 px-4 md:mr-3 leading-tight hover:bg-blue-400 hover:text-gray-300 focus:outline-none focus:bg-white focus:border-gray-500 text-center cursor-pointer' value='Update'>
                <input type='submit' class='appearance-none block w-full bg-white text-gray-800 font-bold uppercase border border-gray-400 rounded-lg py-3 px-4 leading-tight hover:bg-gray-200 hover:text-gray-700 focus:outline-none focus:bg-white focus:border-gray-500 text-center cursor-pointer' value='Delete'>

            </div>
            
        </div>
    </form>
</div>
@endsection