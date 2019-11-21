@extends('layouts.app')

@section('body')

<div>This is Waiting for approval page</div>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@endsection