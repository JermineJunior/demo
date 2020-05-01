@extends('layouts.app')

@section('content')
   @forelse ($posts as $post)
       <div class="card container mx-auto mb-4">
           <div class="card-title">
               <a href="{{ $post->path() }}">
                  {{ $post->title }}
               </a>
           </div>
           <div class="card-body">
               {{ $post->body }}
           </div>
       </div>
   @empty
       <span class="text-red-400">
           Sorry No posts yet.
       </span>
   @endforelse
  
@endsection