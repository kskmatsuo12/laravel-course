@extends('layouts.app')

@section('title')
タイトル
@endsection

@section('css')
<style>
span {
    color: red;
}
</style>
@endsection


@section('content')
@foreach($posts as $post)
 <div>{{$post->title}}<span>{{$post->user->name}}</span></div>

@endforeach
@endsection

@section('javascript')
<script>
 
</script>
@endsection