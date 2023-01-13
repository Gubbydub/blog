@extends('layouts.main')
@section('content')

<div>
    Posts page
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">category</th>
                <th scope="col">likes</th>
            </tr>
        </thead>
        @foreach ($posts as $post)
        <tbody>
            <tr>
                <th scope="row"><a href="{{ route('post.show', $post->id) }}">{{ $post->id}}</a></th>
                <td>{{ $post->title}}</td>
                <td>{{ $post->content}}</td>
                <td>{{ $post->category->title}}</td>
                <td>{{ $post->like}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div>
        {{ $posts->links() }}
    </div>
    <div>
        <a href="{{ route('post.create') }}">
            <button type="button" class="btn btn-primary">Create post</button>
        </a>
    </div>
</div>
@endsection