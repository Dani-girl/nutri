<h1>This is test</h1>
<div class="coontainer">
	<ul>
		<li>{{$requested->birth_year}}</li>
	</ul>
	<ol>
		@for($i=0; $i < count($requested->allergies); $i++)
			<li>{{$requested->allergies[$i]}}</li>
		@endfor
	</ol>
	<hr>
	<p>Number of elements in clientAllergies is {{count($clientAllergies)}}</p>
	<ol>
		@for($i=0; $i < count($clientAllergies); $i++)
			<li>{{$clientAllergies[$i]}}</li>
		@endfor
	</ol>
	<h3>clientAllergies index 0 is {{$clientAllergies[0]}}</h3>
	<p>Number of elements in existingAllergies is {{count($existingAllergies)}}</p>
	<ol>
		@for($i=0; $i < count($existingAllergies); $i++)
			<li>{{$existingAllergies[$i]}}</li>
		@endfor
	</ol>
</div>