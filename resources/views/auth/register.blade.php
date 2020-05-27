@extends('layouts.app')

@section('content')
<div class="register">
    <div class="flex items-center justify-center">
        <svg class="w-10 h-10 block" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.05493 11H5C6.10457 11 7 11.8954 7 13V14C7 15.1046 7.89543 16 9 16C10.1046 16 11 16.8954 11 18V20.9451M8 3.93552V5.5C8 6.88071 9.11929 8 10.5 8H11C12.1046 8 13 8.89543 13 10C13 11.1046 13.8954 12 15 12C16.1046 12 17 11.1046 17 10C17 8.89543 17.8954 8 19 8L20.0645 8M15 20.4879V18C15 16.8954 15.8954 16 17 16H20.0645M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#3ba3e8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <h2 class=" text-center text-xl font-bold">
        Register a new account
    </h2>
    <div class="text-center pb-px">
        <p class="w-full text-xs text-center text-gray-700 mt-2">
            {{ __('Already have an account?') }}
            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>
        </p>
        <div class='flex justify-center my-2'>
            <form class='w-full max-w-xl bg-white rounded-lg p-6' method="POST" action="{{ route('register') }}">
                @csrf
                <div class='flex flex-wrap -mx-3 mb-6'>
                    <div class='w-full md:w-1/2 px-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 text-left' for='grid-text-1'>Name</label>
                        <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-text-1' name="name" type='text' placeholder='Enter Name'  required>
                    </div>
                    <div class='w-full md:w-1/2 px-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 text-left' for='grid-Password-2'>Email Address</label>
                        <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-email-2' type='email' name="email" placeholder='Enter Email Address'  required>
                    </div>
                    <div class='w-full md:w-full px-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 text-left' for='grid-Password-3'>Password</label>
                        <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-password-3' type='password' name="password" placeholder='*******'  required>
                    </div>
                    <div class='w-full md:w-full px-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 text-left' for='grid-Password-4'> Confirm Password </label>
                        <input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='grid-password-4' type='password'  name="password_confirmation" placeholder='*******'  required>
                    </div>
                    <div class="flex flex-wrap px-4 w-full">
                        <button type="submit" class="inline-block w-full text-center align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div> 
    </div>
    @endsection
    