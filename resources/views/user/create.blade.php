@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="card-header">{{ __('Create User') }}</div>

                <div class="card-body">
                    <form  method="post" action="{{url('user/confirm')}}" enctype="multipart/form-data" >
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{session('users') ? session('users')['name'] : ''}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- name -->

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{session('users') ? session('users')['email'] : ''}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- email -->

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{session('users') ? session('users')['password'] : ''}}" required >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- password -->

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{session('users') ? session('users')['password'] : ''}}" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- confirm password -->

                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>

                            <div class="col-md-6">
                            @if(session('users')['profile'])
                                <input id="profile" type="file" class="border-0 pl-0 form-control @error('profile') is-invalid @enderror" name="profile" value="{{ session('users')['profile'] }}" required>
                            @else
                                <input id="profile" type="file" class="border-0 pl-0 form-control @error('profile') is-invalid @enderror" {{ $errors->has('profile') ? ' is-invalid' : ''}} name="profile" required>
                            @endif
                            </div>
                        </div>
                        <!-- profile -->

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="type" class="form-control" id="type">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- type -->

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" value="{{session('users') ? session('users')['phone'] : ''}}" class="form-control" name="phone">
                            </div>
                        </div>
                        <!-- phone -->

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address" rows="4" cols="50">{{session('users') ? session('users')['address'] : ''}}</textarea>
                            </div>
                        </div>
                        <!-- address -->

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" value="{{session('users') ? session('users')['dob'] : ''}}" class="form-control" name="dob">
                            </div>
                        </div>
                        <!-- dob -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary mr-3 ml-3">
                                <input type="button" class="btn btn-danger" value="Clear" onclick="myFunction()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function myFunction() {
    document.forms[1].name.value = '';
    document.forms[1].email.value = '';
    document.forms[1].password.value = '';
    document.forms[1].profile.value = '';
    document.forms[1].type.value = '';
    document.forms[1].phone.value = '';
    document.forms[1].address.value = '';
    document.forms[1].dob.value = '';
    document.getElementById('password-confirm').value = '';
}
</script>
@endsection
