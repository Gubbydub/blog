@extends('layouts.main')
@section('content')

<div class="title m-b-md">
    Posts page
</div>

<div class="links">
    @foreach ($posts as $post)
    <div>{{ $post->title}}</div>
    <div>{{ $post->content}}</div>
    <div>{{ $post->like}}</div>
    @endforeach
</div>

@endsection