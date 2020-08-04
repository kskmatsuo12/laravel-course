@extends('layouts.app')
 
@section('title')
ユーザー一覧ページ
@endsection
 
@section('css')
<link href="{{ asset('css/users.css') }}" rel="stylesheet">
@endsection
 
@section('content')
{{--このようにコメントを書いたほうがよい--}}
{{--<!-- $user -->⬅変数をコメントアウトは×
Nullだったりunderfindなど要らないエラーの可能性になる。
無駄なデータの呼び出しの可能性になる。
--}}
<div class="users">
    @foreach($users as $user)
    <div class="user">
        <a href="{{ route('user.detail',[ 'id'=>$user->id ]) }}">
            <p>ID：{{ $user->id }}</p>
            <p>名前：{{ $user->name }}</p>
            <p>住所：{{ $user->detail->address }}</p>
            <p>電話番号：{{ $user->detail->phone }}</p>
            <p>所属チーム： 
                @foreach($user->teams as $team)
                    {{$team->name}}
                @endforeach
            </p>
        </a>
        {{dd($user)}}
    </div>
    @endforeach
</div>
@endsection
