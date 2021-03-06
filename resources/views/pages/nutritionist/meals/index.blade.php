@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
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
          <a href="{{ url('meal/create') }}" class="btn btn-primary">Add new meal &#43;</a>
          @if(url()->current()==url('meals'))
            <a href="{{ url('my-meals') }}" class="btn btn-secondary">Show my meals</a>
          @else
            <a href="{{ url('meals') }}" class="btn btn-secondary">All meals</a>
          @endif

          @if($meals->first()==null)
            <br><br>
            <h3>No meals to show. Create a meal first.</h3>
          @else
            <div class="nutri-request-text">
                List of meals.
            </div>
            <br>
            <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Title</th>
                      <th scope="col">Added by</th>
                      <th scope="col">Meal type</th>
                      <th scope="col">Diet type</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($meals as $meal)
                    <tr>
                      <td>{{$meal->title}}</td>
                      <td>{{$meal->nutritionist->user->name}}</td>
                      <td>{{$meal->meal_type}}</td>
                      <td>{{$meal->diet_type}}</td>
                      <td><a href="{{ url('meal',[$meal->id])}}" class="btn btn-primary">Details</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              @endif
            </div>
        </div>
    </div>
@endsection
