@extends('layouts.app')

@section('content')
<div class="container">
	<p>To get started with your diet, fill the form bellow:</p>
	<h1>Diet form</h1>
	<hr>
	<form method="POST" action="{{ url('diet-request') }}">
		{{ csrf_field() }}
		<h3>Basic info</h3>
        <div class="form-group row">
        	<div class="col-md-2">
		      <label for="birth_year">Year of birth</label>
		      <input class="form-control" type="number" id="birth_year" name='birth_year' required>
		    </div>
		    <div class="col-md-2">
		      	<label for="sex">Sex</label>
		      	<select class="form-control" id="sex" name="sex" required>
		      		<option selected="true" disabled></option>
				    <option value="male">Male</option>
				    <option value="female">Female</option>
			   	</select>
		    </div>
            <div class="col-md-2">
		      <label for="height">Height (in cm)</label>
		      <input class="form-control" type="number" id="height" name='height' required>
		    </div>
		    <div class="col-md-2">
		      <label for="weight">Weight (in kg)</label>
		      <input class="form-control" type="number" id="weight" name='weight' required>
		    </div>
        </div>
        <br>
        <div class="form-group row">
        	<div class="col-md-10">
        		<h5>Check boxes if you are allergic to:</h5>
        		
        	</div>
        </div>
        <div class="form-group row">
        	<div class="col-md-2">
		      	<label for="blood_type">Blood type</label>
		      	<select class="form-control" id="blood_type" name="blood_type" required>
		      		<option selected="true" disabled></option>
				    <option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				    <option value="O-">I don't know</option>
			   	</select>
		    </div>
		    <div class="col-md-3">
		      	<label for="physical_activity">Physical activity</label>
		      	<select class="form-control" id="physical_activity" name="physical_activity" required>
		      		<option selected="true" disabled></option>
				    <option value="not active">Not active</option>
				    <option value="cardio">Cardio</option>
				    <option value="strength">Strength</option>
				    <option value="mixed">Mixed</option>
			   	</select>
		    </div>
        </div>
        <div class="form-group row">
        	<div class="col-md-10">
        		<h5>Check boxes if you are allergic to:</h5>
        		@foreach($allergies as $allergy)
        			<div class="form-check form-check-inline">
				  	<input name="allergies[]" class="form-check-input" type="checkbox" id="allergy{{$allergies->search($allergy)}}" value="{{$allergy->name}}">
				  	<label class="form-check-label" for="allergy{{$allergies->search($allergy)}}">{{$allergy->name}}</label>
				</div>
				
        		@endforeach
        		<div class="form-check form-check-inline">
				  	<input name="allergies[]" class="form-check-input" type="checkbox" id="allergy{{$allergies->count()}}" value="pekmez">
				  	<label class="form-check-label" for="allergy{{$allergies->count()}}">pekmez</label>
				</div>
				<div class="form-check form-check-inline">
				  	<input name="allergies[]" class="form-check-input" type="checkbox" id="allergy{{$allergies->count()+1}}" value="med">
				  	<label class="form-check-label" for="allergy{{$allergies->count()+1}}">med</label>
				</div>
        	</div>
        </div>
        <div class="form-group row">
        	<div class="col-md-10">
        		Are you vegan, vegeterian or normal<br>
        		<div class="form-check form-check-inline">
	        		<input class="form-check-input" type="radio" name="diet_type" id="vegan" value="vegan">
					<label for="vegan" class="form-check-label">Vegan</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="diet_type" id="vegeterian" value="vegeterian">
					<label for="vegeterian" class="form-check-label">Vegeterian</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="diet_type" id="normal" value="normal">
					<label for="normal" class="form-check-label">Normal</label>
				</div>
        	</div>
        </div>
        <div class="form-group row">
        	<div class="col-10">
        		Have you had any diets in the past?<br>
		        <div class="form-check form-check-inline">
				  	<input class="form-check-input" name="pastDietsPrompt" type="radio" id="PastDietsYes" onclick="showPastDietsForm()">
				  	<label class="form-check-label" for="radioYes">Yes</label>
				</div>
				<div class="form-check form-check-inline">
				  	<input class="form-check-input" name="pastDietsPrompt" type="radio" id="PastDietsNo" onclick="hidePastDietsForm()">
				  	<label class="form-check-label" for="PastDietsNo">No</label>
				</div>
        	</div>
        </div>
        <div class="form-group row" id="pastDietForm">

        </div>
        
        <h3>Daily nutrition info</h3>
        <div class="form-group row">
        	<div class="col-2">
	        	<label for="meals_per_day">How many meals in a day do you usually have</label>
			    <input class="form-control" type="number" name="meals_per_day" id="meals_per_day">
			</div>
        	<div class="col-2">
	        	<label for="late_meal_time">Time of your latest meal in a day</label>
			    <input class="form-control" type="time" value="00:00:00" name="late_meal_time" id="late_meal_time">
			</div>
			<div class="col-2">
				<label for="sweets_consumption">How much sweets do you eat?</label>
				<select class="form-control" id="sweets_consumption" name="sweets_consumption" required>
		      		<option selected="true" disabled></option>
				    <option value="Loads, every day">Loads, every day</option>
				    <option value="A piece of chocolate, every day">A piece of chocolate, every day</option>
				    <option value="Few times in a week">Few times in a week</option>
				    <option value="I don't eat sweets">I don't eat sweets</option>
			   	</select>
			</div>
			<div class="col-2">
				<label for="alcohol_consumption">How much alcohol do you consume?</label>
				<select class="form-control" id="alcohol_consumption" name="alcohol_consumption" required>
		      		<option selected="true" disabled></option>
				    <option value="Loads, every day">Loads, every day</option>
				    <option value="A piece of chocolate, every day">Every week</option>
				    <option value="Few times in a week">Every month</option>
				    <option value="I don't eat sweets">I don't consume alcohol</option>
			   	</select>
			</div>
		</div>
		<div class="form-group row">
				<div class="col-8">
	        	<label for="consuming_everyday">What foods do you consume on a daily basis?</label>
	        	<textarea class="form-control" name="consuming_everyday" id="consuming_everyday"></textarea>
        		</div>
			</div>
		<button type="submit" class="btn btn-primary">
            Submit
        </button>
	</form>
</div>

@endsection
