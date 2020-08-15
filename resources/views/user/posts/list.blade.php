@extends('layouts.app')

@section('title')
タイトル
@endsection

@section('css')

@endsection


@section('content')
@foreach($posts as $post)
<div class="container">
    <p>ID：{{$post->id}}</p>
    <p>タイトル：{{$post->title}}</p>
    <p class="border-bottom">内容：{{$post->content}}</p>
</div>
@endforeach
@endsection

@section('javascript')
<script>
 
</script>
@endsection