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
                This is meal
            </div>
            <br>
            <table class="table table-bordered table-dark">
              <tbody>
                <tr>
                  <th scope="row">Meal title:</th>
                  <td colspan="10">{{$meal->title}}</td>
                </tr>
                <tr>
                  <th scope="row">Meal added by:</th>
                  <td colspan="10">{{$meal->nutritionist->user->name}}</td>
                </tr>
                <tr>
                  <th scope="row">Meal added on:</th>
                  <td>{{$meal->created_at}}</td>
                </tr>
                <tr>
                  <th scope="row">Meal type:</th>
                  <td colspan="10">{{$meal->meal_type}}</td>
                </tr>
                <tr>
                  <th scope="row">Diet type:</th>
                  <td>{{$meal->diet_type}}</td>
                </tr>
                <tr>
                  <th scope="row">Preparation time:</th>
                  <td colspan="10">{{$meal->preparation_time}} min</td>
                </tr>
                <tr>
                  <th scope="row">Cooking time:</th>
                  <td>{{$meal->cooking_time}} min</td>
                </tr>
                <tr>
                  <th scope="row">Original ingredients:</th>
                  <td>{{$meal->original_ingredients}}</td>
                </tr>
                <tr>
                  <th scope="row">Instructions:</th>
                  <td colspan="10">{{$meal->instructions}}</td>
                </tr>
                <tr>
                  <th scope="row">Calories:</th>
                  <td>{{$meal->calories}}</td>
                </tr>
                <tr>
                  <th scope="row">Far:</th>
                  <td colspan="10">{{$meal->fat}}</td>
                </tr>
                <tr>
                  <th scope="row">Carbs:</th>
                  <td>{{$meal->carbs}}</td>
                </tr>
                <tr>
                  <th scope="row">Protein</th>
                  <td>{{$meal->protein}}</td>
                </tr>
                <tr>
              </tbody>
            </table>
            
            <a class="btn btn-secondary" href="{{ url('meals') }}">Go back</a>
        </div>
    </div>
</div>
@endsection
