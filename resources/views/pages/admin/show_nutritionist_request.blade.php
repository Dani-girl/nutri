@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif   
        </div>
    </div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="nutri-request-text">
                You are looking at detailed nutritionist request.
            </div>
            <br>
            <ul>
              <li>Name: {{$request->name}}</li>
              <li>Email: {{$request->email}}</li>
              <li>Education: {{$request->education}}</li>
              <li>Expertise: {{$request->expertise}}</li>
              <li>Summary: {{$request->summary}}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
