@extends('layouts/app')

@section('content')
    <div id="top" class="container h5 p-5">
        <h1>List of all Appointments</h1>
    </div>
    <hr>
    <div class="container">
        <a href="../"><button type="button" class="btn btn-info">Back</button></a>
    </div>
    <hr>
    <div id="app">
        <first-component></first-component>
    </div>
    <div class="container text-center">
        <a href="#top"><button type="button" class="btn btn-info mb-100">Back to Top</button></a>
        <hr>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
@endsection