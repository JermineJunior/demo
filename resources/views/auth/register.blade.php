@extends('layouts.app')

@section('content')
<div class='flex justify-center my-2'>
    <form class='w-full max-w-xl bg-white rounded-lg p-6' method="POST" action="{{ route('register') }}">
        @csrf
        <div class='flex flex-wrap -mx-3 mb-6'>
            <div class='w-full md:w-1/2 px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2' for='grid-text-1'>Name</label>
                <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter Name'  required>
            </div>
            <div class='w-full md:w-1/2 px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2' for='grid-Password-2'>Email Address</label>
                <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-email-2' type='email' placeholder='Enter Email Address'  required>
            </div>
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2' for='grid-Password-3'>Password</label>
                <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-password-3' type='password' placeholder='*******'  required>
            </div>
            <div class='w-full md:w-full px-3 mb-6'>
                <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2' for='grid-Password-4'> Confirm Password </label>
                <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-password-4' type='password' placeholder='*******'  required>
            </div>
            <div class="flex flex-wrap px-4">
            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                {{ __('Register') }}
            </button>

            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                {{ __('Already have an account?') }}
                <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </p>
        </div>
        </div>
    </form>
</div> 
@endsection
