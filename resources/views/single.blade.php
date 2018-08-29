
@extends('layouts.master')
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-10 mx-auto">
    <br>
    <h3 class="mt-4">{{ $post->title }} <span class="lead"> by <a href="#"> {{ $post->user->name }} </a></span> </h3>
    <hr>
    <p>Posted {{ $post->created_at->diffForHumans() }} </p>
    <hr>
    <img class="img-fluid rounded" src=" {!! !empty($post->image) ? '/uploads/posts/' . $post->image :  'http://placehold.it/750x300' !!} " alt="">
    <hr>
    <div>
    <p>{{ $post->body }} </p><hr>
    <br>
</div>
@auth
<div id="app">
<Comments :post-i-d="{{ json_encode($post->id) }}" :user-Name="{{ json_encode(Auth::user()->name) }}"></Comments>
</div>
@endauth
</div>
</div>
</div>

@endsection