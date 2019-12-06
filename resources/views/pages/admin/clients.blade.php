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
                Here you can see all clients, you can contact them, give them admin role, or delete them.
            </div>
            <br>
            <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Client since</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($clients as $client)
                    <tr>
                      <td>{{$client->name}}</td>
                      <td>{{$client->email}}</td>
                      <td>{{$client->created_at}}</td>
                      <td><a href="{{ url('clients',[$client->id])}}" class="btn btn-primary">Details</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
