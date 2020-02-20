@extends('layouts.app')

@section('content')
{{-- <form method="POST" action="{{ route('post.store') }}">
  @csrf
  @if(Auth::check())
  <div class="form-group">
  <label for="exampleFormControlInput1">タイトル</label>
  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ old('title') }}">
  </div>
  
  <div class="form-group">
  <label for="exampleFormControlTextarea1">本文</label>
  <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ old('body') }}"></textarea>
  </div>
  @endif
  <button type="submit" name="submit" class="btn btn-primary">投稿</button>
</form>   --}}

<a class="btn-primary btn-lg" href="{{ route('post.create') }}" role="button">投稿</a>
<br>
<br>
<form method="GET" action="{{ route('post.index') }}">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">タイトル</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value={{$searchTitle}}>
    <div class="form-group">
        <label for="number" class="control-label col-xs-2">Number</label>
        <div class="col-xs-3">
          <select class="form-control" id="number" name="tag">
            <option value=0>全てのカテゴリー</option>
            @foreach ($tags as $tag)
            <option value={{$tag->id}} @if ($tag->id==$searchTag) selected @endif>{{$tag->body}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">検索</button>
  </form>  

  {{-- @foreach ($topPosts as $post_id)
    <p>{{$post_id->post->title}}</p>
  @endforeach --}}
  <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">人気投稿</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">プロフィール</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">コンタクト</a>
      </li> --}}
    </ul>
 
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="card-group">
              @foreach ($topPosts as $comment)
              <div class="card">
                  <div class="card-body">
                  <h5 class="card-title"><a href="{{route('post.show',['post' => $comment->post_id])}}">{{$comment->post->title}}</a></h5>
                    <p class="card-text">{!! nl2br(e(str_limit($comment->post->body, 200))) !!}</p>
                  </div>
                  <div class="card-footer ">
                  <small class="text-muted text-right">{{$comment->post->created_at}}<a href="{{route('post.show',['post' => $comment->post_id])}}" class="badge badge-primary">コメント:{{$comment->comment_count}}</a></small>
                  </div>
                  
                </div>
              @endforeach
          </div>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">プロフィールの文章です。...</div>
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">コンタクトの文章です。...</div>
    </div>


    {{-- @foreach ($posts as $post)



    <div class="card m-md-2 m-lg-2 m-xl-2">
            <div class="card-header">
              <a href="{{route('post.show',['post' => $post])}}">{{$post->title}}</a>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>{!! nl2br(e(str_limit($post->body, 200))) !!}</p>
              <footer class="blockquote-footer">
              <a href= "{{route('post.tag',['tag'=>$post->tag_id])}}">{{$post->tag->body}}</a>
                <a href= "{{route('user.show',['user_id'=>$post->user_id])}}">{{$post->user->name}}</a>
                 投稿時:{{$post->created_at}}
              </footer>
              </blockquote>
            </div>
          </div>
    @endforeach --}}
    <table class="table table-hover table-bordered">
      <thead>
          <tr>
              <th>タイトル</th>
              <th>カテゴリー</th>
              <th>本文</th>
              <th>ユーザー名</th>
              <th>投稿日</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($posts as $post)
          <tr>
            <td>
              <a href="{{route('post.show',['post' => $post])}}">{{$post->title}}</a>
            </td>
              <td><a href= "{{route('post.index',['tag'=>$post->tag->id])}}">{{$post->tag->body}}</a></td>
              <td>{!! nl2br(e(str_limit($post->body, 50))) !!}</td>
              <td>
                <a href= "{{route('user.show',['user_id'=>$post->user_id])}}">{{$post->user->name}}</a>
              </td>
              <td>{{$post->created_at}}</td>
          </tr>  
          @endforeach
          
      </tbody>
  </table>






    
    {{-- {{$posts->appends(request()->input())->links()}} --}}
 
      {{$posts->appends(['tag'=>$searchTag , 'title'=>$searchTitle])->links()}}

@endsection