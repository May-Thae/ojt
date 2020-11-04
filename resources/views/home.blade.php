@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>

        </tr>
        </thead>
        <tbody>
        @foreach($homeposts as $homepost)
        <tr>
            <td>{{$homepost['id']}}</td>
            <td>{{$homepost['title']}}</td>
            <td>{{$homepost['description']}}</td>

        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
  {{ $homeposts->links() }}
    </div>
</div>
@endsection
