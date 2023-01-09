@extends('layouts.main')
@section('content')

<div>
  Posts page
</div>
<div>
  <form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ old('title') }}">
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea name="content" class="form-control" id="content" placeholder="Content">{{ old('content') }}</textarea>
      @error('content')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" id="category" name="category_id">
        @foreach ($categories as $category )
        <option 
        {{ old('category_id') == $category->id ? ' selected' : ''}}
        value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="tags">tags</label>
      <select multiple class="form-control" id="tags" name="tags[]">
        @foreach ($tags as $tag)
        <option
        {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? ' selected' : '' }}
        value="{{ $tag->id }}">{{ $tag->title}}</option>
        @endforeach
      </select>
      @error('tags')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="like">like</label>
      <input value="{{ old('like') }}" type="number" name="like" class="form-control" id="like" placeholder="Set like">
      @error('like')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Add post</button>
  </form>
</div>
@endsection