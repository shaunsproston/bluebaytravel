@extends('layouts/app')

@section('content')
    <h1>List of all Appointments</h1>
    <hr>
    <button>Back</button>
    <div id="app">
        <first-component></first-component>
    </div>
    <script src="{{ asset('js/app.js')}}"></script> 
@endsection