<h2>You have a new request for a nutritionist position!</h2>
<p>Waiting to be approved!</p>
<ul>
	<li><b>Date when request was created: {{$email->created_at}}</b></li>
	<li>Id: {{$email->id}}</li>
	<li>Name: {{$email->name}}</li>
	<li>Expertise: {{$email->expertise}}</li>
</ul>

<h3><a href="{{ url('nutritionist-requests',[$email->id])}}">Click here</a> to redirect to page where you can approve or delete the request.</h3>