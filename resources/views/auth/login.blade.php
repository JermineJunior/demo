@extends('layouts.app')

@section('content')
<div class="login mt-1">
    <div class="flex items-center justify-center">
        <svg class="w-10 h-10 block" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.05493 11H5C6.10457 11 7 11.8954 7 13V14C7 15.1046 7.89543 16 9 16C10.1046 16 11 16.8954 11 18V20.9451M8 3.93552V5.5C8 6.88071 9.11929 8 10.5 8H11C12.1046 8 13 8.89543 13 10C13 11.1046 13.8954 12 15 12C16.1046 12 17 11.1046 17 10C17 8.89543 17.8954 8 19 8L20.0645 8M15 20.4879V18C15 16.8954 15.8954 16 17 16H20.0645M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#3ba3e8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <h2 class=" text-center text-xl font-bold">
        Sign in to your account
    </h2>
    <div class="text-center pb-px">
        @if (Route::has('register'))
        <p class="w-full text-sm text-center text-gray-800 mt-2">
            or
            <a class="text-blue-500 hover:text-blue-800 no-underline" href="{{ route('register') }}">
                register a new account
            </a>
        </p>
        @endif
    </div>
    <div class='flex justify-center my-2'>
        <form class='w-full max-w-xl bg-white rounded-lg shadow-sm p-6' method="POST" action="{{ route('login') }}">
            @csrf
            <div class='flex flex-wrap -mx-3 mb-6'>
                <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2' for='grid-Password-1'>email</label>
                    <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' name="email" id='grid-email-1' type='email' placeholder='Enter email'  required>
                </div>
                @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
                <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2' for='grid-Password-2'>password</label>
                    <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' name="password" id='grid-password-2' type='password' placeholder='*******'  required>
                </div>
                @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
                <div class="flex items-center mb-8 px-4">
                    <label class="inline-flex w-1/2 mr-56 items-center text-sm text-gray-800" for="remember">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox bg-gray-100" {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2">{{ __('Remember Me') }}</span>
                    </label>
                    <div class="w-1/2 right-0">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:text-blue-800 whitespace-no-wrap no-underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
                
                <div class="px-4 mt-4 w-full">
                    <button type="submit" class="bg-blue-500 w-full text-center hover:bg-blue-800 text-gray-100 font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection
    