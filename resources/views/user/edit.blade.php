@extends('layouts.app')

{{-- @section('content')
<form action="{{route('user.update',['user'=>$user->id])}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
            <label for="title">名前</label>
            <input id="title" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">更新</button>
    
@endsection --}}
@section('content')
<div class="row">
        <div class="col-4">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">名前・自己紹介</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">パスワード</a>
          </div>
        </div>
        
        <div class="col-8">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <form action="{{route('user.update',['user'=>$user->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">名前 :15文字以下の英数字</label>
                                <input id="title" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                                <label for="title">自己紹介</label>
                                <textarea id="body" class="form-control" name="body" rows="8" required>{{ $user->body }}</textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">更新</button>
                    </form>
                            
            </div>

            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <form action="{{ route('user.update',['user'=>$user->id])}}" method="post">     
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">現在のパスワード</label>
                    <input id="body" class="form-control" name="nowPassword" required>
                    <label for="title">新しいパスワード:5文字以上の英数字</label>
                    <input id="body" class="form-control" name="newPassword" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
            </div>
        </div>
</div>

@endsection
