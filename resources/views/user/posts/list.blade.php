@extends('layouts.app')

@section('title')
タイトル
@endsection

@section('css')

@endsection


@section('content')
@foreach($posts as $post)
 <div>{{$post->title}}</div>
@endforeach
@endsection

@section('javascript')
<script>
 
</script>
@endsection