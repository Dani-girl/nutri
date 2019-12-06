@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
	<h3>You have sent a request for a diet, and now waiting a nutritionist's reply. Please be patient.</h3><br>

	<h4>You have sent following information:</h4>

	<ul class="list-group">
		<li class="list-group-item">Birth year : {{$diet_request->birth_year}}</li>
		<li class="list-group-item">Sex : {{$diet_request->sex}}</li>
		<li class="list-group-item">Height : {{$diet_request->height}}</li>
		<li class="list-group-item">Weight : {{$diet_request->weight}}</li>
		<li class="list-group-item">
			Allergies :
		</li>
		<li class="list-group-item">Blood type : {{$diet_request->blood_type}}</li>
		<li class="list-group-item">Physical activity : {{$diet_request->physical_activity}}</li>
		<li class="list-group-item">Diet type : {{$diet_request->diet_type}}</li>
		@if($diet_request->past_diets_title == true)
			<li class="list-group-item">Past diet name : {{$diet_request->past_diets_title}}</li>
			<li class="list-group-item">Past diet description : {{$diet_request->past_diets_description}}</li>
			<li class="list-group-item">Past diet success rate : {{$diet_request->past_diets_success_rate}}</li>
		@endif
		<li class="list-group-item">Meals per day : {{$diet_request->meals_per_day}}</li>
		<li class="list-group-item">Latest meal in a day : {{$diet_request->late_meal_time}}</li>
		<li class="list-group-item">Sweets consumption : {{$diet_request->sweets_consumption}}</li>
		<li class="list-group-item">Alcohol consumption : {{$diet_request->alcohol_consumption}}</li>
		<li class="list-group-item">Everyday food consumption : {{$diet_request->consuming_everyday}}</li>
	</ul>
</div>
@endsection