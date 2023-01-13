@extends('layouts.main')
@section('content')

<div>
  Posts page
</div>
<div>
  <form action="{{ route('post.update', $post->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $post->title }}">
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea name="content" class="form-control" id="content" placeholder="Content">{{ $post->content }}</textarea>
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" id="category" name="category_id">
        @foreach ($categories as $category )
        <option {{ $category->id === $post->category->id ? ' selected' : ''}}
           value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="tags">tags</label>
      <select multiple class="form-control" id="tags" name="tags[]">
        @foreach ($tags as $tag)
        <option @foreach ($post->tags as $postTag)
          {{ $tag->id === $postTag->id ? ' selected' : ''}}
          @endforeach
          value="{{ $tag->id }}">{{ $tag->title }}
        </option>
        @endforeach
      </select>
      @error('tags')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="like">like</label>
      <input type="number" name="like" class="form-control" id="like" placeholder="Set like" value="{{ $post->like }}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>
@endsection