@extends('layouts.app')

@section('content')
<h2>{{$user->name}}</h2>

<a href={{route("user.edit",["user"=>$user->id])}}>aaaa</a>
{!! nl2br(e($user->body)) !!}


{{$user->posts->count()}}

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>本文</th>
                <th>投稿日</th>
                <th>更新日</th>
                @if (Auth::check() && $user->id==Auth::id())
                    <th>編集:削除</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($user->posts as $post)
                <tr>
                    <td>
                        <a href="{{ url('post/' . $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td>{!! nl2br(e(str_limit($post->body,76))) !!}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    
                        @if ($post->user_id==Auth::id())
                        <td>
                            <a href="{{url('post/'.$post->id.'/edit')}}">編集</a>
                            <form style="display:inline" action="{{ url('post/'.$post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                削除
                                </button>
                            </form>
                        </td>
                        @endif
                    
            @endforeach
        </tbody>
    </table>
</div>
{{ $user->posts->links() }}
@endsection