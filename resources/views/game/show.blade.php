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
                <th scope="col">Category</th>
                <th scope="col">likes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $game->id}}</th>
                <td>{{ $game->title}}</td>
                <td>{{ $game->content}}</td>
                <td>{{ $game->category_id}}</td>
                <td>{{ $game->like}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">

        <a href="{{ route('games.index') }}">
            <button type="button" class="btn btn-primary mr-3">Back</button>
        </a>
        <a href="{{ route('games.edit', $game->id) }}">
            <button type="button" class="btn btn-warning mr-3">Edit</button>
        </a>

        <form action="{{ route('games.destroy', $game->id) }}" method='post'>
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mr-3">Delete</button>
        </form>
    </div>
</div>
@endsection