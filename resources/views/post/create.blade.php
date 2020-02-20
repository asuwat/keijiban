@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('post.store') }}">
    @csrf
 
    <div class="form-group">
    <label for="exampleFormControlInput1">タイトル</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="form-group">
        <label for="number" class="control-label col-xs-2">Number</label>
        <div class="col-xs-3">
            <select class="form-control" id="number" name="tag">
            @foreach ($tags as $tag)
                <option value={{$tag->id}}>{{$tag->body}}</option>
            @endforeach
            </select>
        </div>
          
    </div>
    
    <div class="form-group">
    <label for="exampleFormControlTextarea1">本文</label>
    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">投稿</button>
</form>
    
@endsection