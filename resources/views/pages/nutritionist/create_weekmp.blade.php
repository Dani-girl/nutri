@extends('layouts.app')

@push('head')
<style type="text/css">
	.show{
		display: block;
	}
	.hide{
		display: none;
	}
</style>
<script type="text/javascript">
	function switchTabs(elementId) {
		for (var i = 1; i < 8; i++) {
			var element = document.getElementById("day"+i);

			// element.classList.remove("show");
	   		element.classList.add("hide");
	   		document.getElementById("tab"+i).classList.remove("active");
		}
		var element = document.getElementById("day"+ elementId);
		element.classList.remove("hide");
	   	element.classList.add("show");
	   	document.getElementById("tab"+ elementId).classList.add("active");
	}

	function toggleIngredients(btnID, elementID){
		var button = document.getElementById(btnID);
		var element = document.getElementById(elementID);
		if (button.innerHTML == 'Customize ingredients') {
			button.innerHTML = 'Keep original ingredients';
			element.classList.remove('hide');
			element.classList.add('show');
		}else{
			button.innerHTML = 'Customize ingredients';
			document.getElementById(elementID + '_' + 'txta').value = '';
			element.classList.remove('show');
			element.classList.add('hide');
		}
	}
	var showOriginalIngredientsID;
	function showOriginalIngredients(elementID, showHereID){
		var ingredients = document.getElementById(elementID).value;
		document.getElementById(showHereID).innerHTML = ingredients;
		showOriginalIngredientsID = ingredients;
	}
</script>
@endpush

@section('content')
<div class="container">
	<div class="form-group row">
		<div class="col-md-5">
			<h3>Requested diet's information:</h3>
				<div class="form-group row">
					<div class="col-md-12">Name: {{$diet_request->client->name}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">Birth year: {{$diet_request->birth_year}}</div>
					<div class="col-md-6">Sex: {{$diet_request->sex}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">Height: {{$diet_request->height}}</div>
					<div class="col-md-6">Weight: {{$diet_request->weight}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">
					Allergies: 
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
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">Blood type: {{$diet_request->blood_type}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">Diet type: {{$diet_request->diet_type}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">Physical activity: {{$diet_request->physical_activity}}</div>
				</div>
				@if($diet_request->past_diets_title == true)
					<div class="form-group row">
					<div class="col-md-12">Past diet's title: {{$diet_request->past_diets_title}}</div>
					</div>
					<div class="form-group row">
					<div class="col-md-12">Past diet's description: {{$diet_request->past_diets_description}}</div>
					</div>
					<div class="form-group row">
					<div class="col-md-12">Past diet's success rate: {{$diet_request->past_diets_success_rate}}</div>
					</div>
				@else
					<div class="form-group row">
						<div class="col-md-12">No information about past diets</div>
					</div>
				@endif
				<div class="form-group row">
					<div class="col-md-12">Number of meals per day: {{$diet_request->meals_per_day}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">Time of latest meal in a day: {{$diet_request->late_meal_time}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">Sweets consumption: {{$diet_request->sweets_consumption}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">Alcohol consumption: {{$diet_request->alcohol_consumption}}</div>
				</div>
				<div class="form-group row">
					<div class="col-md-12">Every day food consumption: {{$diet_request->consuming_everyday}}</div>
				</div>
		</div>
		<div class="col-md-7">
			<h3>Create week meal plan</h3>
			<div class="form-group row">
				<div class="col-md-12">
					<ul class="list-group list-group-horizontal">
						@for($i = 1; $i < 8; $i++)
							<a id="tab{{$i}}" href="#" class="list-group-item list-group-item @if($i==1) active @endif" onclick="switchTabs({{$i}})">Day {{$i}}
							</a>
						@endfor
					</ul><hr>
				</div>
			</div>
			<form method="POST" action="{{ url('week-meal-plan') }}">
				{{csrf_field()}}
				
				@for($i = 1; $i < 8; $i++)
				<div id="day{{$i}}" @if ($i==1)
	        							class="show"
	        						@else
	        							class="hide"
	    							@endif>
	    			<h3>Day {{$i}}</h3>

	    			@foreach($meal_types as $meal_type)

	    			
	    			<h5>{{$meal_type}}</h5>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="">Chose a meal:</label>
							<select class="form-control" id="{{$meal_type}}_id{{$i}}" name="{{$meal_type}}_id{{$i}}" onchange="showOriginalIngredients('{{$meal_type}}_id{{$i}}','{{$meal_type}}_id{{$i}}_txt')">     		
								<option selected="true" disabled></option>
								@foreach($meals as $meal)
								
								<option value="{{$meal->id}}">{{$meal->title}}</option>
								
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row" id="{{$meal_type}}_id{{$i}}_txt">
						<div class="col-md-12">
							<b>Original meal's ingredients:</b><br>
						</div>
					</div>
					<div id="buttonEx{{$i}}" class="btn btn-primary" onclick="toggleIngredients('buttonEx{{$i}}' ,'this{{$i}}')">Customize ingredients</div><br><br>
					<div id='this{{$i}}' class="hide">
						<div class="form-group row">
							<div class="col-md-12">
								<label for="breakfast_ingredients_{{$i}}">Breakfast custom ingredients:</label>
								<textarea class="form-control" name="breakfast_ingredients_{{$i}}" id="this{{$i}}_txta"></textarea>
							</div>
						
						</div>
					</div>
					
					@endforeach
				</div>
				@endfor
			</form>
		</div>
	</div>
</div>
@endsection