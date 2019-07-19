@extends('layouts/app')

@section('content')
<div id="top" class="container h5 p-5">
    <h1>List of all Appointments</h1>
    <i class="far fa-calendar-alt"></i>
</div>
<hr>
<div class="container">
    <a href="/bookings/create"><button type="button" class="btn btn-info">Add Appointment</button></a>
</div>
<hr>
<div>
    <appointments-list :user="{{ $userId }}"></appointments-list>
</div>
<div class="container text-center">
    <a href="#top"><button type="button" class="btn btn-info mb-100">Back to Top</button></a>
    <hr>
</div>
@endsection