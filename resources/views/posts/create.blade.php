@extends('layouts.app')

@section('content')
<div class='flex justify-center my-2'>
    <form class='w-full max-w-xl bg-white rounded-lg p-6' method="POST" action="/posts">
        @csrf
        <div class='flex flex-wrap -mx-3 mb-6'>
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Post Title</label>
                <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-text-1' type='text' name="title" placeholder='Enter Post Title'  required>
            </div>
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-area-3'>Post body</label>
                <textarea class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-text-area-3' cols="15" name="body" placeholder='Enter Post body' required></textarea>
            </div>
            <div class='w-full md:w-1/3 px-3 mb-6'>
                <input type='submit' class='appearance-none block w-full bg-gray-400 text-gray-700 font-bold uppercase border border-gray-200 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-center cursor-pointer' id='submit-5' value='Publish'>
            </div>
            
        </div>
    </form>
</div>
@endsection
