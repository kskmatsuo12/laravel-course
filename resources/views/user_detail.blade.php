@extends('layouts.app')

@section('title')
{{$user->name}}のプロフィール
@endsection()

@section('css')
<link href="{{ asset('css/users.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="user">
    <h1>{{$user->name}}の投稿一覧</h1>
    <div class="posts">
        @foreach($user->posts as $post)
        <div class="post">
            <p>タイトル：{{$post->title}}</p>
            <p>ユーザー名前：{{$post->user->name}}</p>
            <button id="like{{$post->id}}" onclick="like({{ $post->id }})" class="like_btn">いいねボタン</button>
            <button id="unlike{{$post->id}}" onclick="unlike({{ $post->id }})" class="unlike_btn">いいね済み</button>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('javascript')
<script>
function like(id) {
let url = "{{ route('like') }}";
$.ajax({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    url: url, //web.phpのURLに合わせる
    type: 'POST',
    data: {
      id: id
    } //Laravelに渡すデータ
  })
    // Ajaxリクエスト成功時の処理
    .done(function(res) {
        //成功するとこっちを通る
        $('#like'+id).toggle();
        $('#unlike'+id).toggle();
        if(res.response == true){
            // みたいな書き方もできる
        }
        
    })
    // Ajaxリクエスト失敗時の処理
    .fail(function(data) {

    });
}
</script>
@endsection