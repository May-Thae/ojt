@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1 class="text-center mb-4">User List</h1>
    </div>
    <div class="row mb-5">
        <form action="/user/search" method="get" class="col-10 row">
            <div class="col-2">
                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>
            </div>
            <div class="col-2">
                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email">
            </div>
            <div class="col-2">
                <input id="createdFrom" type="date" class="form-control" name="createdFrom">
            </div>
            <div class="col-2">
                <input id="createdTo" type="date" class="form-control" name="createdTo">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </form>
        <div class="col-2">
            <a href="{{ url('/user/create') }}" class="btn btn-success w-100">Add User</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $users)
                <tr>
                    <td>{{$users['id']}}</td>
                    <td>{{$users['name']}}</td>
                    <td>{{$users['email']}}</td>
                    <td>{{$users['type']}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
  {{ $user->links() }}
    </div>
</div>
@endsection
