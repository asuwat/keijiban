@extends('layouts.app')

@section('content')

    <div class="card m-md-2 m-lg-2 m-xl-2">
        <div class="card-header">
                {{$posts->title}}<div class="float-right">{{$posts->user->name}}  投稿時:{{$posts->created_at}}</div>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
                
            <p>{!! nl2br(e($posts->body)) !!}</p>
            
          </blockquote> 
          @php
              $count = 1;
          @endphp
          @forelse($posts->comments as $comment)
                    <div class="border-top p-4">
                        {{$count}}     {{$comment->user->name}}
                        @php
                            $count++;
                        @endphp
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
           @endforelse
           
           <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{$posts->id}}">
            @if (Auth::check())
            <textarea id="body" class="form-control" name="body" rows="6" required>
            </textarea>
            @endif

           <button type="submit" name="submit" class="btn btn-primary">コメント</button>
           </form>
        </div>
      </div>
    
@endsection
