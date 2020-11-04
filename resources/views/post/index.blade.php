@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row mb-3">
        <form action="/post/search" method="get" class="col-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control typeahead">
                <span class="form-group-btn">
                <button type="submit" class="btn btn-primary">Search</button></span>
            </div>
        </form>
        <!-- end search -->
        <div class="col-2"><a href="{{action('PostController@create')}}" class="btn btn-success w-100">Add Post</a></div>
        <!-- end add post -->
        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data" class="col-7 d-flex justify-content-between">
            @csrf
            <div class="form-group mb-0 col-5">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary col-3 mr-2">Upload</button>
            <a class="btn btn-success col-3" href="{{ route('file-export') }}">Download</a>
        </form>
    </div>
    @if(session('info'))
        <div class="alert alert-info">
        {{ session('info') }}
        </div>
    @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Posted User</th>
        <th>Posted Date</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['description']}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post['created_at']->format('d/m/Y')}}</td>
        <td><a href="{{action('PostController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('PostController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
<div class="d-flex justify-content-center">
  {{ $posts->links() }}
    </div>
  </div>
  <!-- <div>
  </div> -->
@endsection
