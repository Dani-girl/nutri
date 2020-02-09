@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <br>
    	<h3>Edit your meal</h3>
        <h2 class="text-danger">Caution!! When you change this meal information, you will change it for all the clients and nutritionists using it!!</h2>
        <br>
    	<form method="POST" action="{{ url('meals',[$meal->id]) }}">
            {{method_field('PUT')}}
    		@csrf
            <div class="form-group row">
            	<div class="col-md-6">
    		      <label for="title">Meal title</label>
    		      <input class="form-control" type="text" id="title" name='title' required value="{{$meal->title}}">
    		    </div>
    		</div>
            <div class="form-group row">
            	<div class="col-md-3">
    		      	<label for="meal_type">Meal type</label>
    		      	<select class="form-control" id="meal_type" name="meal_type" required>
    		      		<option disabled></option>
                        <option value="breakfast" 
                            @if($meal->meal_type == 'breakfast')
                                selected="true"
                            @endif
                        >Breakfast</option>
                        <option value="lunch" 
                        @if($meal->meal_type == 'lunch')
                                selected="true"
                            @endif
                        >Lunch</option>
                        <option value="dinner" 
                        @if($meal->meal_type == 'dinner')
                                selected="true"
                            @endif
                        >Dinner</option>
                        <option value="snack" 
                            @if($meal->meal_type == 'snack')
                                selected="true"
                            @endif
                        >Snack</option>
    			   	</select>
    		    </div>
    		    <div class="col-md-3">
    		      	<label for="diet_type">Diet type</label>
    		      	<select class="form-control" id="diet_type" name="diet_type" required>
    		      		<option disabled></option>
                    <option value="vegan" 
                        @if($meal->diet_type == 'vegan')
                            selected="true"
                        @endif
                    >Vegan</option>
                    <option value="vegeterian" 
                        @if($meal->diet_type == 'vegeterian')
                            selected="true"
                        @endif
                    >Vegeterian</option>
                    <option value="normal" 
                        @if($meal->diet_type == 'normal')
                            selected="true"
                        @endif
                    >Normal</option>
    			   	</select>
    		    </div>
                <div class="col-md-3">
                    <label for="preparation_time">Preparation time (minutes)</label>
                    <input class="form-control" type="number" id="preparation_time" name="preparation_time" value="{{$meal->preparation_time}}" required>
                </div>
                <div class="col-md-3">
                    <label for="cooking_time">Cooking time (minutes)</label>
                    <input class="form-control" type="number" id="cooking_time" name="cooking_time" value="{{$meal->cooking_time}}" required>
                </div>
            </div>
            <div class="form-group row">
            	
            </div>
            <div class="form-group row">
            	<div class="col-5">
    	        	<label for="original_ingredients">Ingredients</label>
    	        	<textarea rows="5" class="form-control" name="original_ingredients" id="original_ingredients">{{$meal->original_ingredients}}</textarea>
            	</div>
                <div class="col-7">
                    <label for="instructions">Instructions</label>
                    <textarea rows="5" class="form-control" name="instructions" id="instructions">{{$meal->instructions}}</textarea>
                </div>
            </div>
            <div class="form-group row">
            	
            </div>
            <div class="form-group row">
            	<div class="col-md-3">
            		<label for="calories">Calories</label>
            		<input class="form-control" type="number" id="calories" name="calories" value="{{$meal->calories}}" required>
            	</div>
            	<div class="col-md-3">
            		<label for="fat">Fat</label>
            		<input class="form-control" type="number" id="fat" name="fat" value="{{$meal->fat}}" required>
            	</div>
            	<div class="col-md-3">
            		<label for="carbs">Carbs</label>
            		<input class="form-control" type="number" id="carbs" name="carbs" value="{{$meal->carbs}}" required>
            	</div>
            	<div class="col-md-3">
            		<label for="protein">Protein</label>
            		<input class="form-control" type="number" id="protein" name="protein" value="{{$meal->protein}}" required>
            	</div>
            </div>
            
            <input type="hidden" name="meal_id" value="{{$meal->id}}">

    		<button type="submit" class="btn btn-primary">
                Submit
            </button>
    	</form>
    </div>
</div>
@endsection