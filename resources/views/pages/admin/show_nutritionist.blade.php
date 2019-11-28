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
                You are looking at nutritionist {{$nutritionist->user->name}}'s details.
            </div>
            <br>
            <table class="table table-bordered table-dark">
              <tbody>
                <tr>
                  <th scope="row">Request created at:</th>
                  <td colspan="10">{{$nutritionist->created_at}}</td>
                </tr>
                <tr>
                  <th scope="row">Name:</th>
                  <td colspan="10">{{$nutritionist->user->name}}</td>
                </tr>
                <tr>
                  <th scope="row">E-mail:</th>
                  <td>{{$nutritionist->user->email}}</td>
                </tr>
                <tr>
                  <th scope="row">Photo:</th>
                  <td colspan="10">{{$nutritionist->photo}}</td>
                </tr>
                <tr>
                  <th scope="row">Education:</th>
                  <td>{{$nutritionist->education}}</td>
                </tr>
                <tr>
                  <th scope="row">Expertise:</th>
                  <td colspan="10">{{$nutritionist->expertise}}</td>
                </tr>
                <tr>
                  <th scope="row">Diploma:</th>
                  <td>{{$nutritionist->diploma}}</td>
                </tr>
                <tr>
                  <th scope="row">Experience:</th>
                  <td colspan="10">{{$nutritionist->experience}}</td>
                </tr>
                <tr>
                  <th scope="row">Summary:</th>
                  <td>{{$nutritionist->summary}}</td>
                </tr>
              </tbody>
            </table>
            <form class="inline" action="{{url('contact-nutritionist')}}" method="POST">
             @csrf
             <input type="hidden" name="id" value="{{$nutritionist->id}}">
             <input type="submit" class="btn btn-primary" value="Contact"/>
            </form>
            <form class="inline" action="{{url('nutritionists', [$nutritionist->id])}}" method="POST">
             {{method_field('DELETE')}}
             @csrf
             <input type="hidden" name="id" value="{{$nutritionist->id}}">
             <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
    </div>
</div>
@endsection
