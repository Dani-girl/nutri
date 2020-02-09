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
	function myFunction(elementId) {
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
</script>
@endpush

@section('content')
<div class="container">
	<h1>Meal plan for this week</h1>
	<ul class="list-group list-group-horizontal">
		@foreach($weekPlan->dailyPlan()->get() as $dailyPlan)
			<a id="tab{{$dailyPlan->day}}" href="#" class="list-group-item list-group-item @if($loop->first) active @endif" onclick="myFunction({{$dailyPlan->day}})">Day {{$dailyPlan->day}}</a>
			
		@endforeach
	</ul>
	<br>

	<div class="row">
		<div class="col-md-7">
	@foreach($weekPlan->dailyPlan()->get() as $dailyPlan)
		<div id="day{{$dailyPlan->day}}" @if ($loop->first)
						        										class="show"
						        									@else
						        										class="hide"
						    											@endif>
			<h3>Day {{$dailyPlan->day}}</h3>
			@foreach($dailyPlan->meal()->get() as $meal)
			<h4>Meal: {{$meal -> title}}</h4>
					<div class="row">
						<div class="col-md-6"><b>Preparation time:</b> {{$meal->preparation_time}} minutes</div>
						<div class="col-md-6"><b>Cooking time:</b> {{$meal->cooking_time}} minutes</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>
								<b>Ingredients: </b>
								@if($meal->pivot->custom_ingredients == true)
									{{$meal->pivot->custom_ingredients}}
								@else
									{{$meal->original_ingredients}}
								@endif
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p><b>Instructions: </b>{{$meal->instructions}}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><b>Calories:</b> {{$meal->calories}}</div>
						<div class="col-md-3"><b>Fat:</b> {{$meal->fat}}</div>
						<div class="col-md-3"><b>Carbs:</b> {{$meal->carbs}}</div>
						<div class="col-md-3"><b>Protein:</b> {{$meal->protein}}</div>
					</div>
					<hr>
			@endforeach
		</div>
	@endforeach
		</div>
	<div class="col-md-5">
		<h4>Avoid: </h4>
		<p>{{$weekPlan -> avoid}}</p>
		<h4>Exercise plan: </h4>
		<p>{{$weekPlan -> exercise}}</p>
		<h4>Explanation: </h4>
		<p>{{$weekPlan -> explanation}}</p>
	</div>
	</div>
</div>
@endsection