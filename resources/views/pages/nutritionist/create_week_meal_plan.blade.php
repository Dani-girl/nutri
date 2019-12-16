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

	function existingMeal(idName, i){
		var id1 = "e" + idName + i;
		var id2 = "c" + idName + i;
		var element1 = document.getElementById(id1);
		var element2 = document.getElementById(id2);
		element1.classList.add("show");
		element1.classList.remove("hide");
		element2.classList.add("hide");
		
		var inputID = idName +"_id"+i;
		document.getElementById(inputID).value = '';
		

	}

	function customMeal(idName, i){
		var id2 = "e" + idName + i;
		var id1 = "c" + idName + i;
		var element1 = document.getElementById(id1);
		var element2 = document.getElementById(id2);
		element1.classList.add("show");
		element1.classList.remove("hide");
		element2.classList.add("hide");

		var inputID = idName +"_id"+i;
		document.getElementById(inputID).value = '';
	}
</script>
@endpush

@section('content')
	<div class="container">
		<div class="form-group row">
			<div class="col-md-5"></div>
			<div class="col-md-3 position-fixed">
				<div class="form-group row"><h3>Requested diet's information:</h3></div>
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
					<div class="col-md-5">Blood type: {{$diet_request->blood_type}}</div>
					<div class="col-md-7">Diet type: {{$diet_request->diet_type}}</div>
				</div>
				<div class="form-group row">
					Physical activity: {{$diet_request->physical_activity}}
				</div>
				@if($diet_request->past_diets_title == true)
					<div class="form-group row">
					Past diet's title: {{$diet_request->past_diets_title}}
					</div>
					<div class="form-group row">
					Past diet's description: {{$diet_request->past_diets_description}}
					</div>
					<div class="form-group row">
					Past diet's success rate: {{$diet_request->past_diets_success_rate}}
					</div>
				@else
					<div class="form-group row">
						No information about past diets
					</div>
				@endif
				<div class="form-group row">
					Number of meals per day: {{$diet_request->meals_per_day}}
				</div>
				<div class="form-group row">
					Time of latest meal in a day: {{$diet_request->late_meal_time}}
				</div>
				<div class="form-group row">
					Sweets consumption: {{$diet_request->sweets_consumption}}
				</div>
				<div class="form-group row">
					Alcohol consumption: {{$diet_request->alcohol_consumption}}
				</div>
				<div class="form-group row">
					Every day food consumption: {{$diet_request->consuming_everyday}}
				</div>
			</div>

			<div class="col-md-7">
				<form method="POST" action="{{ url('week-meal-plan') }}">
					{{csrf_field()}}
					<h3>Create a diet here</h3><br>
					<ul class="list-group list-group-horizontal">
						@for($i = 1; $i < 8; $i++)
							<a id="tab{{$i}}" href="#" class="list-group-item list-group-item @if($i==1) active @endif" onclick="switchTabs({{$i}})">Day {{$i}}
							</a>
						@endfor
					</ul><hr>
					<div class="row">
						
					@for($i = 1; $i <= 7; $i++)
					<div id="day{{$i}}" @if ($i==1)
        									class="show"
        								@else
        									class="hide"
    									@endif>
						<div class="form-group row">
							<div class="col-md-12">
								<h3>Day {{$i}}</h3>
							</div>
						</div>
						<h5>Breakfast</h5>
						<div class="form-group row">
							<div class="col-md-12">
								<div class="form-group row">
									<div class="col-md-12">
										@foreach($meals as $meal)
										<div id="">
												<div class="form-group row">
													<div class="col-md-12">
														<label for="">Chose a meal:</label>
										      	<select class="form-control" id="" name="">
										      		
										      		
										      		<!-- <option selected="true" disabled></option> -->
										      	
															<option value="{{$meal->id}}">{{$meal->title}}</option>
														
													
											   	</select>
											   </div>
											</div>
											<div class="col-md-12">
												Original ingredients: {{$meal->original_ingredients}}
											</div>
										</div><br>
										<div class="btn btn-primary">Add custom ingredients</div>
										<div class="form-group row">
												<div class="col-md-12">
											      <label for="">Breakfast custom ingredients:</label>
											      <textarea class="form-control" name="" id=""></textarea>
											  	</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>

							@foreach($meal_types as $meal_type)

							<h5>{{$meal_type}}:</h5>
							
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group row">
									<div class="col-md-12">
											@foreach($meals as $meal)
											<div id="e{{$meal_type}}{{$i}}">
												<div class="form-group row">
													<div class="col-md-12">
														<label for="{{$meal_type}}_id{{$i}}">Chose a meal:</label>
										      	<select class="form-control" id="{{$meal_type}}_id{{$i}}" name="{{$meal_type}}_id{{$i}}">
										      		
										      		
										      		<!-- <option selected="true" disabled></option> -->
										      		
										      		
												    
														@if($meal->meal_type == preg_replace('/[0-9]+/', '', strtolower($meal_type)))
															<option value="{{$meal->id}}">{{$meal->title}}</option>
														@endif
													
											   	</select>
											   </div>
											</div>
											<div class="col-md-12">
												Original ingredients: {{$meal->original_ingredients}}
											</div>
										</div>
										@endforeach
									</div>
									</div>
								
									<div class="form-group row">
										<div class="form-check form-check-inline">
										  	<input class="form-check-input" name="{{$meal_type}}Prompt{{$i}}" type="radio" id="existing{{$meal_type}}{{$i}}" onclick="existingMeal('{{$meal_type}}', {{$i}})" checked>
										  	<label class="form-check-label" for="radioYes">Choose a meal</label>
										</div>
										<div class="form-check form-check-inline">
										  	<input class="form-check-input" name="{{$meal_type}}Prompt{{$i}}" type="radio" id="custom{{$meal_type}}{{$i}}" onclick="customMeal('{{$meal_type}}', {{$i}})">
										  	<label class="form-check-label" for="PastDietsNo">Add custom ingredients</label>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-12">
										
											<div id="e{{$meal_type}}{{$i}}">
												<div class="form-group row">
													<div class="col-md-12">
												<label for="{{$meal_type}}_id{{$i}}">Existing meal:</label>
										      	<select class="form-control" id="{{$meal_type}}_id{{$i}}" name="{{$meal_type}}_id{{$i}}">
										      		
										      		
										      		<!-- <option selected="true" disabled></option> -->
										      		
										      		
												    @foreach($meals as $meal)
														@if($meal->meal_type == preg_replace('/[0-9]+/', '', strtolower($meal_type)))
															<option value="{{$meal->id}}">{{$meal->title}}</option>
														@endif
													@endforeach
											   	</select>
											   </div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div id="c{{$meal_type}}{{$i}}" class="hide">
											<div class="form-group row">
												<div class="col-md-12">
											      <label for="{{$meal_type}}_custom_ingredients{{$i}}">{{$meal_type}} custom ingredients:</label>
											      <textarea class="form-control" name="{{$meal_type}}_custom_ingredients{{$i}}" id="{{$meal_type}}_custom_ingredients{{$i}}"></textarea>
											  	</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>

								@endforeach

							</div>
						
					@endfor
						
					
					<hr>
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-12">
						   	<label for="avoid">Food to avoid</label>
						   	<textarea class="form-control" name="avoid" id="avoid"></textarea>
						   </div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
						   	<label for="exercise_plan">Exercise plan</label>
						   	<textarea class="form-control" name="exercise_plan" id="exercise_plan"></textarea>
						   </div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
							<label for="explanation">Explanation</label>
							  	<textarea class="form-control" name="explanation" id="explanation"></textarea>
							  </div>
						</div>
					<input type="hidden" name="diet_id" value="{{$diet_request -> id}}">
					<button class="btn btn-primary" type="submit">
						Submit meal diet plan
					</button>
				</div>
				</form>
				</div>
			</div>
			
			
		</div>
	</div>
@endsection


