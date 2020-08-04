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
        <p>タイトル：{{ $post->title }}</p>
        <p>名前：{{ $post->user->name }}</p>
        <button onclick="like( {{ $post->id }} )">いいねボタン</button>
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
        console.log(res.response)
    })
    // Ajaxリクエスト失敗時の処理
    .fail(function(data) {



 
    });
}
</script>
@endsection
