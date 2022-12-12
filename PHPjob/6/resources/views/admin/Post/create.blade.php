@extends('layouts.app')
@section('title', 'Home')

@section('content')
<link rel="stylesheet" href="/public/css/style.css">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class = "header">ホーム</h2>
                <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title"></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body"placeholder = "いまどうしてる？" value="{{ old('body') }}">
                            <input type="hidden" name="user_id" value ="{{Auth::user()->id}}">
                            @csrf
                            <input type = "submit" class="btn btn-primary" value="つぶやく">
                        </div>
                    </div>
                </form>
                @foreach($posts as $post)
                   @foreach($users as $user)
                   <table>
                    <div class = "box1">
                        @if($user->id == $post->user_id)
                        <div>{{$user->name}}</div>
                        <div>{{$post->created_at}}</div>
                        <div>{{$post->body}}</div>
                        @if(Auth::id()== $post->user_id)
                        <div>
                            <a href="{{ action('Admin\NewsController@delete', ['id' => $post->id]) }}">削除</a>
                        </div>
                        @endif
                        @endif
                    </div>
                    </table>
                    @endforeach
                </div>
                @endforeach
        </div>
    </div>
@endsection