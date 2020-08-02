@extends('layouts.app')

@section('content')
<body>
    <ul>
        <li><a href="{{ route('users') }}">レッスン３ユーザー一覧</a></li>
        <li><a href="{{ route('image') }}">レッスン３画像投稿</a></li>
    </ul>

{{--Vueは下記を読まないとダメ
    <div id="app">
        <app-component/>
    </div>
--}}
</body>
@endsection

@section('javascript')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection