@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="{{action('PostController@update', $id)}}">
        <div class="form-group row">
        {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="title" placeholder="Title" name="title" value="{{$post->title}}">
            </div>
        </div>
        <!-- end title -->
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" rows="8" cols="80" class="form-control form-control-lg" placeholder="Description">{{$post->description}}</textarea>
            </div>
        </div>
        <!-- end description -->
        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <label class="switch col-form-label col-form-label-lg">
                        <input type="hidden" name="status" id="status" value="">
                        <input data-id="{{$post->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $post->status ? 'checked' : '' }}>
                        <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2"></div>
            <button type="submit" class="btn btn-primary mr-3">Update</button>
            <input type="button" class="btn btn-danger" value="Clear" onclick="myFunction()">
        </div>
    </form>
</div>
@endsection
<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(function() {
    var status = $(this).prop('checked') == true ? 1 : 0;
    $("#status").val(status);
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        $("#status").val(status);
    })
  })

  function myFunction() {
    console.log(document.forms);
    document.getElementById('title').value = '';
    document.getElementById('description').value = '';
}
</script>
