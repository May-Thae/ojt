@extends('layouts.app')
@section('content')
<div class="container">
<form method="post" action="{{url('post/confirm')}}">
    <div class="form-group row">
    {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="title" value="{{session('posts') ? session('posts')['title'] : ''}}" placeholder="title" name="title" autofocus required>
      </div>
    </div>
    <div class="form-group row">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
      <div class="col-sm-10">
        <textarea name="description" id="description" rows="8" cols="80" class="form-control form-control-lg" placeholder="Description" required>{{session('posts') ? session('posts')['description'] : ''}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary mr-3 ml-3">
      <input type="button" class="btn btn-danger" value="Clear" onclick="myFunction()">
    </div>
  </form>
</div>

<script>
function myFunction() {
    document.forms[1].title.value = '';
    document.getElementById('description').value = '';
}
</script>
@endsection
