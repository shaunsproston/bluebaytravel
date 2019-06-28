@extends('layouts/app')

@section('content')
    <h1>List of all Appointments</h1>
    <hr>
    <a href="../"><button>Back</button></a>
    <div id="app">
        <first-component></first-component>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
@endsection