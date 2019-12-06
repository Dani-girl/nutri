@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif   
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="nutri-request-text">
                This is a board with diet requests.
            </div>
            <br>
            <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Request made on:</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($diet_requests as $diet_request)
                    <tr>
                      <td>{{$diet_request->client->name}}</td>
                      <td>{{$diet_request->client->email}}</td>
                      <td>{{$diet_request->created_at}}</td>
                      <td><a href="{{ url('diet-request',[$diet_request->id])}}" class="btn btn-primary">Details</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
