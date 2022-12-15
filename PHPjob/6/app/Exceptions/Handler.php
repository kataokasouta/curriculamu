<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
}
/** 
 * @extends('layouts.app')
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
                    <div class = "box1">
                        <div class = "box2">
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
                    </div>
                    @endforeach
                </div>
                @endforeach
        </div>
    </div>
@endsection
