@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-2">
    <h2 class="text-gray-800 text-2xl">
        {{ $profileUser->name }}
        <small>{{ $profileUser->created_at->diffForHumans() }}</small>
    </h2>
</div>
@endsection
