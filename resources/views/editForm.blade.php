@extends('layouts/app')

@section('content')
<div class="container h5 p-5">
    <h1>Edit Booking Details</h1>
</div>
<hr>
<div class="container">
    <a href="/bookings/{{ $appointment->id }}"><button type="button" class="btn btn-info">Back</button></a>
</div>
<hr>
<div class="container">
    <form class="form-horizontal" action="/bookings/{{ $appointment->id }}" method="POST">
        @csrf
        @method('PUT')
        <h3>Treatment details</h3>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="treatmentType">Select treatment:</label>
            <select class="form-control" name="treatmentType">
                <option value="{{ $appointment->treatment->id }}">{{ $appointment->treatment->type }}</option>
                @foreach($treatments as $treatment)
                <option value="{{ $treatment->id }}">{{ $treatment->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-inline m-3">
            <br>
            <label class="control-label col-sm-3"  for="treatmentDate">Select treatment date:</label>
            <input class="form-control" type="date" name="treatmentDate" min="{{ Carbon::now()->format('Y-m-d') }}" max="{{ Carbon::now()->addMonths(3)->format('Y-m-d') }}" value="{{ $appointment->treatment_start_time->format('Y-m-d') }}">
        </div>
        <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="treatmentTime">Select time slot:</label>
                <select class="form-control" name="treatmentTime">
                    <option value="{{ old('first_name', $appointment->treatment_start_time->format('H:i')) }}">{{ $appointment->treatment_start_time->format('H:i') }}</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </div>
        <hr>
        <h3>Personal details</h3>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $appointment->client->first_name) }}" required>
        </div>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $appointment->client->last_name) }}" required>
        </div>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $appointment->client->email) }}" required>
        </div>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="tel">Telephone Number:</label>
            <input type="tel" class="form-control" name="tel" value="{{ old('tel', $appointment->client->tel) }}" required>
        </div>
        <hr>
        <h3>Address</h3>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="house_number">House Name / Number:</label>
            <input type="text" class="form-control" name="house_number" value="{{ old('house_number', $appointment->client->house_number) }}" required>
        </div>
        <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="street">Street Name:</label>
                <input type="text" class="form-control" name="street" value="{{ old('street', $appointment->client->street) }}" required>
            </div>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="town">Town / City:</label>
            <input type="text" class="form-control" name="town" value="{{ old('town', $appointment->client->town) }}" required>
        </div>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="county">County / State:</label>
            <input type="text" class="form-control" name="county" value="{{ old('county', $appointment->client->county) }}" required>
        </div>
        <div class="form-inline m-3">
            <label class="control-label col-sm-3" for="postcode">Postcode / Zipcode:</label>
            <input type="text" class="form-control"name="postcode" value="{{ old('postcode', $appointment->client->postcode) }}" required>
        </div>
        <hr>
        <div class="form-inline m-3">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection