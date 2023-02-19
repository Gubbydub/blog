@extends('layouts.admin')
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
        <tbody>
            <tr>
                <th scope="row">{{ $post->id}}</th>
                <td>{{ $post->title}}</td>
                <td>{{ $post->content}}</td>
                <td>{{ $post->category->title}}</td>
                <td>{{ $post->like}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">

        <a href="{{ route('admin.post.index') }}">
            <button type="button" class="btn btn-primary mr-3">Back</button>
        </a>
        <a href="{{ route('admin.post.edit', $post->id) }}">
            <button type="button" class="btn btn-warning mr-3">Edit</button>
        </a>

        <form action="{{ route('admin.post.destroy', $post->id) }}" method='post'>
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mr-3">Delete</button>
        </form>
    </div>
</div>
@endsection