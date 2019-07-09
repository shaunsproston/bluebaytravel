@extends('layouts/app')

@section('content')
<div class="container">
    <br>
    <a href="{{ route('bookings.index') }}"><button type="button" class="btn btn-info">Back</button></a>
    <a href="/bookings/{{ $data->id }}/edit"><button type="button" class="btn btn-info">Edit Appointment</button></a>
    <a href="#"><button type="button" class="btn btn-danger">Remove Appointment</button></a>
</div>
<hr>
<div>
    <h2>Customer Name - <span id="name">{{ $data->client->first_name .' '. $data->client->last_name }}</span></h2>
    <h4>Customer ID - <span id="type">{{ $data->client->id }}</span></h4>
    <h4>Booked in for <span id="type">{{$data->treatment->type }}</span> on <span id="type">{{ $data->treatment_start_time->format('l jS \\of F Y') }}</span></h4>
</div>
<br>
<hr>
<div class="card bg-info text-white" style="width:500px">
    <div class="card-body">
        <h5>Appointment Details</h5>
        <ul class="list-unstyled">
            <li>Type of Treatment - <span>{{ $data->treatment->type }}</span></li>
            <li>Duration - <span>{{ $data->treatment->duration }} minutes</span></li>
            <li>Treatment Starts - <span>{{ $data->treatment_start_time->format('h:i a') }}</span></li>
            <li>Treatment Finishes - <span>{{ $data->treatment_end_time->format('h:i a') }}</span></li>
            <li>Price - <span>£{{ $data->treatment->price }}</span></li>
        </ul>
    </div>
</div>
<br>
<div class="card bg-info text-white" style="width:500px">
    <div class="card-body">
        <h5>Contact Details</h5>
        <ul class="list-unstyled">
            <li>Email - <span>{{ $data->client->email }}</span></li>
            <li>Contact Number - <span>{{ $data->client->tel }}</span></li>
            <li>Address - </li>
            <ul class="list-unstyled ml-5">
                <li><span>{{ $data->client->house_number .' '. $data->client->street }},</span></li>
                <li><span>{{ $data->client->town }},</span></li>
                <li><span>{{ $data->client->county }},</span></li>
                <li><span>{{ $data->client->postcode }}</span></li>
            </ul>
        </ul>
    </div>
</div>
@endsection