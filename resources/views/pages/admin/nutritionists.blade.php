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
                Here you can see all hired nutritionists, you can contact them, delete them.
            </div>
            <br>
            <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Expertise</th>
                      <th scope="col">Nutritionist since</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($nutritionists as $nutritionist)
                    <tr>
                      <td>{{$nutritionist->user->name}}</td>
                      <td>{{$nutritionist->expertise}}</td>
                      <td>{{$nutritionist->created_at}}</td>
                      <td><a href="{{ url('nutritionists',[$nutritionist->id])}}" class="btn btn-primary">Details</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
