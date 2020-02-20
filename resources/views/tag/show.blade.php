@extends('layouts.app')

@section('content')
@foreach ($posts as $post)



<div class="card m-md-2 m-lg-2 m-xl-2">
        <div class="card-header">
          <a href="{{route('post.show',['post' => $post])}}">{{$post->title}}</a>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>{!! nl2br(e(str_limit($post->body, 200))) !!}</p>
          <footer class="blockquote-footer">{{$post->tag->body}}<a href= "{{route('user.show',['user_id'=>$post->user_id])}}">{{$post->user->name}}</a>   投稿時:{{$post->created_at}}</footer>
          </blockquote>
        </div>
      </div>
@endforeach
{{-- {{$posts->links()}} --}}
{{-- {{$posts->appends(['tag'=>$posts->tag->id])->links()}} --}}
    
@endsection