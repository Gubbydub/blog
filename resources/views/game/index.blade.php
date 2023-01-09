@extends('layouts.main')
@section('content')

<div>
    Games page
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
        @foreach ($games as $game)
        <tbody>
            <tr>
                <th scope="row"><a href="{{ route('games.show', $game->id) }}">{{ $game->id}}</a></th>
                <td>{{ $game->title}}</td>
                <td>{{ $game->content}}</td>
                <td>{{ $game->category_id}}</td>
                <td>{{ $game->like}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div>
        <a href="{{ route('games.create') }}">
            <button type="button" class="btn btn-primary">Add new game</button>
        </a>
    </div>
</div>
@endsection