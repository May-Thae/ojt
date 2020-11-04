@extends('layouts.app')
@section('content')
<div class="container col-md-8 col-md-offset-2">
<h2>Confirm</h2>
  <div class="well well bs-component">
    <form method="post" action="{{ action('UserController@store') }}" >
       {{csrf_field()}}
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <p>{{$user['name']}}</p>
                <input type="hidden" name="name" value="{{$user->name}}">
            </div>
        </div>
        <!-- name -->

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <p>{{$user['email']}}</p>
                <input type="hidden" name="email" value="{{$user->email}}">
            </div>
        </div>
        <!-- email -->

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
            <input id="password" type="password" class="con-pass form-control @error('password') is-invalid @enderror" name="password" value="{{session('users') ? session('users')['password'] : ''}}" required >

                <input type="hidden" name="password" value="{{$user->password}}">
            </div>
        </div>
        <!-- password -->

        <div class="form-group row">
            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>

            <div class="col-md-6">
                <img src="{{ $user->image_link }}" alt="{{$user->profile}}" style="max-width: 100%; height:100%; max-height: 150px;">
                <input type="hidden" name="profile" value="{{$user->profile}}">
            </div>
        </div>
        <!-- profile -->

        <div class="form-group row">
            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

            <div class="col-md-6">
                <p>{{$user['type'] == 1 ? 'Admin' : 'User'}}</p>
                <input type="hidden" name="type" value="{{$user->type}}">
            </div>
        </div>
        <!-- type -->

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

            <div class="col-md-6">
                <p>{{$user['phone']}}</p>
                <input type="hidden" name="phone" value="{{$user->phone}}">
            </div>
        </div>
        <!-- phone -->

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

            <div class="col-md-6">
                <p>{{$user['address']}}</p>
                <input type="hidden" name="address" value="{{$user->address}}">
            </div>
        </div>
        <!-- address -->

        <div class="form-group row">
            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

            <div class="col-md-6">
                <p>{{$user['dob']}}</p>
                <input type="hidden" name="dob" value="{{$user->dob}}">
            </div>
        </div>
        <!-- dob -->

        <div class="form-group row mb-0">
            <a href="{{ action('UserController@create') }}" class="btn btn-primary mr-2">Back</a>
            <button type="submit" class="btn btn-primary">Add Post</button>
        </div>
    </form>
  </div>
</div>
@endsection
<style>
.form-control.con-pass {
    pointer-events: none;
    border: none;
    background: none;
}
</style>
