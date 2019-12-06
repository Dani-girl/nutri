@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <br>
    	<h3>To add a meal, fill the form bellow</h3><br>

    	<form method="POST" action="{{ url('meal') }}">
    		{{ csrf_field() }}
            <div class="form-group row">
            	<div class="col-md-6">
    		      <label for="title">Meal title</label>
    		      <input class="form-control" type="text" id="title" name='title' required>
    		    </div>
    		</div>
            <div class="form-group row">
            	<div class="col-md-3">
    		      	<label for="meal_type">Meal type</label>
    		      	<select class="form-control" id="meal_type" name="meal_type" required>
    		      		<option selected="true" disabled></option>
    				    <option value="breakfast">Breakfast</option>
    				    <option value="lunch">Lunch</option>
    				    <option value="dinner">Dinner</option>
    				    <option value="snack">Snack</option>
    			   	</select>
    		    </div>
    		    <div class="col-md-3">
    		      	<label for="diet_type">Diet type</label>
    		      	<select class="form-control" id="diet_type" name="diet_type" required>
    		      		<option selected="true" disabled></option>
    				    <option value="vegan">Vegan</option>
    				    <option value="vegeterian">Vegeterian</option>
    				    <option value="normal">Normal</option>
    			   	</select>
    		    </div>
                <div class="col-md-3">
                    <label for="preparation_time">Preparation time (minutes)</label>
                    <input class="form-control" type="number" id="preparation_time" name="preparation_time" required>
                </div>
                <div class="col-md-3">
                    <label for="cooking_time">Cooking time (minutes)</label>
                    <input class="form-control" type="number" id="cooking_time" name="cooking_time" required>
                </div>
            </div>
            <div class="form-group row">
            	
            </div>
            <div class="form-group row">
            	<div class="col-5">
    	        	<label for="original_ingredients">Ingredients</label>
    	        	<textarea rows="5" class="form-control" name="original_ingredients" id="original_ingredients"></textarea>
            	</div>
                <div class="col-7">
                    <label for="instructions">Instructions</label>
                    <textarea rows="5" class="form-control" name="instructions" id="instructions"></textarea>
                </div>
            </div>
            <div class="form-group row">
            	
            </div>
            <div class="form-group row">
            	<div class="col-md-3">
            		<label for="calories">Calories</label>
            		<input class="form-control" type="number" id="calories" name="calories" required>
            	</div>
            	<div class="col-md-3">
            		<label for="fat">Fat</label>
            		<input class="form-control" type="number" id="fat" name="fat" required>
            	</div>
            	<div class="col-md-3">
            		<label for="carbs">Carbs</label>
            		<input class="form-control" type="number" id="carbs" name="carbs" required>
            	</div>
            	<div class="col-md-3">
            		<label for="protein">Protein</label>
            		<input class="form-control" type="number" id="protein" name="protein" required>
            	</div>
            </div>
            
    		<button type="submit" class="btn btn-primary">
                Submit
            </button>
    	</form>
    </div>
</div>
@endsection