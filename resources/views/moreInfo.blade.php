@extends('layouts/app')

@section('content')

<moreinfo-component :appointment-id="{{ $appointment->id }}" :user="{{ $appointment->user_id }}"></moreinfo-component>

{{-- <div class="float-right">
    <h4>Booked by User - <span id="name">{{ $data->user->name }}</span></h6>
    <h6>User ID - <span id="type">{{ $data->user->id }}</span></h4>
</div>
<br>
<br>
<hr>
<div class="container">
    <br>
    <a href="./"><button type="button" class="btn btn-info">Back</button></a>
    <a href="/bookings/{{ $data->id }}/edit"><button type="button" class="btn btn-info">Edit Appointment</button></a>
    <button type="button" id="removeBtn" class="btn btn-danger float-right" onclick="javascript:showDiv();">Remove Appointment</button>
</div>
<hr>
<div id="warningMsg" class="container alert alert-danger">
    <h3>Are you sure you want to remove this booking?</h3>
    <div>
        <form action="/bookings/{{ $data->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-success">Confirm</button>
            <button type="button" class="btn btn-danger" onclick="javascript:hideDiv();">Cancel</button>
        </form>
    </div>
</div>

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
</div> --}}
{{-- <script>
    showDiv = ()=> {
        document.querySelector("#warningMsg").style.display = "inline-block";
    };

    hideDiv = ()=> {
        document.querySelector("#warningMsg").style.display = "none";
    };
</script> --}}
@endsection