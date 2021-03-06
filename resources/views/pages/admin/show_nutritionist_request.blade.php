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
            <table class="table table-bordered table-dark">
              <tbody>
                <tr>
                  <th scope="row">Request created at:</th>
                  <td colspan="10">{{$request->created_at}}</td>
                </tr>
                <tr>
                  <th scope="row">Name:</th>
                  <td colspan="10">{{$request->name}}</td>
                </tr>
                <tr>
                  <th scope="row">E-mail:</th>
                  <td>{{$request->email}}</td>
                </tr>
                <tr>
                  <th scope="row">Photo:</th>
                  <td colspan="10">{{$request->photo}}</td>
                </tr>
                <tr>
                  <th scope="row">Education:</th>
                  <td>{{$request->education}}</td>
                </tr>
                <tr>
                  <th scope="row">Expertise:</th>
                  <td colspan="10">{{$request->expertise}}</td>
                </tr>
                <tr>
                  <th scope="row">Diploma:</th>
                  <td>{{$request->diploma}}</td>
                </tr>
                <tr>
                  <th scope="row">Experience:</th>
                  <td colspan="10">{{$request->experience}}</td>
                </tr>
                <tr>
                  <th scope="row">Summary:</th>
                  <td>{{$request->summary}}</td>
                </tr>
              </tbody>
            </table>
            <form class="inline" action="{{url('nutritionists')}}" method="POST">
             @csrf
             <input type="hidden" name="id" value="{{$request->id}}">
             <input type="submit" class="btn btn-primary" value="Approve"/>
            </form>
            <form class="inline" action="{{url('nutritionist-requests', [$request->id])}}" method="POST">
             {{method_field('DELETE')}}
             @csrf
             <input type="hidden" name="id" value="{{$request->id}}">
             <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
    </div>
</div>
@endsection
