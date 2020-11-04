@extends('layouts.app')

@section('content')
<div class="container">
<div class="row flex-wrap align-item-center justify-content-between mb-4">
    <h2>User Profile</h2>
    <a href="{{action('UserController@edit', Auth::user()->id)}}" class="btn btn-warning">Edit</a>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                               <p>{{$user['name']}}</p>
                            </div>
                        </div>
                        <!-- name -->

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <p>{{$user['email']}}</p>
                            </div>
                        </div>
                        <!-- email -->


                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>

                            <div class="col-md-6" style="width:300px; height: 150px;">
                            <img src="{{ $user->image_link }}" alt="{{$user->profile}}" style="max-width: 100%; height:100%;">
                            </div>
                        </div>
                        <!-- profile -->

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <p>{{$user['type']}}</p>
                            </div>
                        </div>
                        <!-- type -->

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                            <p>{{$user['phone']}}</p>
                            </div>
                        </div>
                        <!-- phone -->

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <p>{{$user['address']}}</p>
                            </div>
                        </div>
                        <!-- address -->

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <p>{{$user['dob']}}</p>
                            </div>
                        </div>
                        <!-- dob -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
