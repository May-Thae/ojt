@extends('layouts.app')

@section('content')
<div class="container">
<div>
    <h1 class="text-center mb-4">Users List</h1>
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
</div>
@endsection
