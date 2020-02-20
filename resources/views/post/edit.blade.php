@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('post.update',['post'=>$post->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body" rows="8" required>{{ $post->body }}</textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection