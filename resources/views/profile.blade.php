@extends('layout')
@section('content')
    @auth
    <div id="app">
        <profile></profile>
    </div>       
    @endauth
    @guest
        <div class="alert alert-dark" role="alert">
            Please login to see your profile.
            <a class="btn btn-light btn-sm" href="/login">zum login</a>
        </div>    
    @endguest
@endsection        

