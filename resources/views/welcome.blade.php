@extends('layouts.app')

@section('content')
<div class="w-full">
    <nav class="bg-white -mt-4 py-6">
        <div class="md:flex items-center justify-between py-2 px-8 md:px-12">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-gray-800 md:text-3xl">
                    
                </div>
                
            </div>
        </div>
    </nav>
    <div class="flex bg-white" style="height:620px;">
        <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
            <div>
                <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Welcome to my Blog  <span class="text-blue-600">Website</span></h2>
                <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id necessitatibus odio quam quasi, quibusdam rem tempora voluptates. Cumque debitis dignissimos id quam vel!</p>
                <div class="flex justify-center lg:justify-start mt-6">
                    <a class="px-4 py-3 bg-blue-700 text-gray-200 text-sm  font-medium rounded hover:bg-blue-500" href="#">Get Started</a>
                    <a class="mx-4 px-4 py-3 bg-gray-300 text-gray-900 text-sm  font-medium rounded hover:bg-gray-400" href="{{ route('register') }}">Sign Up</a>
                </div>
            </div>
        </div>
        <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
            <div class="h-full object-cover bg-cover" style="background-image: url('images/cover2.png')">
                <div class="h-full bg-gray-400 opacity-25"></div>
            </div>
        </div>
    </div>
</div>
@endsection