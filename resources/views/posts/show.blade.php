@extends('layouts.app')

@section('content')
<div class="card container mx-auto mb-4">
    <div class="card-title">
        {{ $post->title }}
    </div>
    <div class="card-body">
        {{ $post->body }}
    </div>
</div>
@endsection
