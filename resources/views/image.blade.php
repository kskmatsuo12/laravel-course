@extends('layouts.app')

@section('title')
画像の投稿
@endsection()

@section('css')
<link href="{{ asset('css/users.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="users">
    {{--バリデーションここから--}}
    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{--バリデーションここまで--}}
    <div>
        {{--enctype='multipart/form-data'を忘れない--}}
        <form method="POST" action="{{ route('image.post') }}" enctype='multipart/form-data'>
            @csrf
            <input type="file" name="image" />
            <button type="submit">送信する</button>
        </form>
    </div>
</div>
@endsection