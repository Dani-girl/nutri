@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
	
	<div class="row justify-content-center">
        <div class="col-md-10">
            <h3>You have sent a request for a diet, and now waiting a nutritionist's reply. Please be patient.</h3><br>

			<h4>You have sent following information:</h4>
            <br>
            <table class="table table-bordered table-dark">
              <tbody>
                <tr>
                  <th scope="row">Request sent on:</th>
                  <td colspan="10">{{$diet_request->created_at}}</td>
                </tr>
                <tr>
                  <th scope="row">Birth year:</th>
                  <td colspan="10">{{$diet_request->birth_year}}</td>
                </tr>
                <tr>
                  <th scope="row">Sex:</th>
                  <td>{{$diet_request->sex}}</td>
                </tr>
                <tr>
                  <th scope="row">Height:</th>
                  <td colspan="10">{{$diet_request->height}} cm</td>
                </tr>
                <tr>
                  <th scope="row">Weight:</th>
                  <td>{{$diet_request->weight}} kg</td>
                </tr>
                <tr>
                  <th scope="row">Blood type:</th>
                  <td colspan="10">{{$diet_request->blood_type}}</td>
                </tr>
                <tr>
                  <th scope="row">Diet type:</th>
                  <td>{{$diet_request->diet_type}}</td>
                </tr>
                <tr>
                  <th scope="row">Physical activity:</th>
                  <td>{{$diet_request->physical_activity}}</td>
                </tr>
                <tr>
                	<th>Allergies:</th>
                	<td>
                		@if(count($diet_request->client->allergy) == null)
                      No allergies
                    @else
                      @foreach($diet_request->client->allergy as $allergy)
                        {{$allergy->name}}
                        @if($loop->last)
                        @else
                          ,
                        @endif
                      @endforeach
                    @endif
                	</td>
                </tr>
                <tr>
                  <th scope="row">Meals per day:</th>
                  <td colspan="10">{{$diet_request->meals_per_day}}</td>
                </tr>
                <tr>
                  <th scope="row">Late meal time:</th>
                  <td>{{$diet_request->late_meal_time}}</td>
                </tr>
                <tr>
                  <th scope="row">Sweets consumption</th>
                  <td>{{$diet_request->sweets_consumption}}</td>
                </tr>
                <tr>
                  <th scope="row">Alcohol consumption:</th>
                  <td colspan="10">{{$diet_request->alcohol_consumption}}</td>
                </tr>
                <tr>
                  <th scope="row">Consuming everyday:</th>
                  <td>{{$diet_request->consuming_everyday}}</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection