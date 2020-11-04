@extends('layouts.app')
@section('content')
<div class="container col-md-8 col-md-offset-2">
<h2>Confirm Post</h2>
  <div class="well well bs-component">
    <form method="post" action="{{ action('PostController@store') }}">
    {{csrf_field()}}
       <div class="form-group">
        <p>Title</p>
        <p>{{$post['title']}}</p>
        <input type="hidden" name="title" value="{{$post->title}}">
      </div>
      <div class="form-group">
        <p>Description</p>
        <p>{{$post['description']}}</p>
        <input type="hidden" name="description" value="{{$post->description}}">
      </div>
      <a href="{{ action('PostController@create') }}" class="btn btn-primary">Back</a>
      <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
  </div>
</div>
@endsection
