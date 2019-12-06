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
                You are looking at client {{$client->name}}'s details.
            </div>
            <br>
            <table class="table table-bordered table-dark">
              <tbody>
                <tr>
                  <th scope="row">Client since:</th>
                  <td colspan="10">{{$client->created_at}}</td>
                </tr>
                <tr>
                  <th scope="row">Name:</th>
                  <td colspan="10">{{$client->name}}</td>
                </tr>
                <tr>
                  <th scope="row">E-mail:</th>
                  <td>{{$client->email}}</td>
                </tr>
                <tr>
                  <th scope="row">Diet status:</th>
                  <td colspan="10">odraditi kasnije</td>
                </tr>
              </tbody>
            </table>
            <form class="inline" action="{{url('contact-client')}}" method="POST">
             @csrf
             <input type="hidden" name="id" value="{{$client->id}}">
             <input type="submit" class="btn btn-primary" value="Contact"/>
            </form>
            <form class="inline" action="{{url('clients', [$client->id])}}" method="POST">
             {{method_field('DELETE')}}
             @csrf
             <input type="hidden" name="id" value="{{$client->id}}">
             <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
    </div>
</div>
@endsection
