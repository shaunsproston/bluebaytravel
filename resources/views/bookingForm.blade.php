@extends('layouts/app')

@section('content')
    <div class="container h5 p-5">
        <h1>Book your treatment</h1>
    </div>
    <hr>
    <div class="container">
        <a href="../"><button type="button" class="btn btn-info">Back</button></a>
    </div>
    <hr>
        <form class="form-horizontal" action="#">
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="treatment">Select treatment:</label>
                <select class="form-control" id="treatment">
                    <option>Full Body Massage</option>
                    <option>Back, Neck, Shoulder Massage</option>
                    <option>Foot Massage</option>
                    <option>Indian Head Massage</option>
                </select>
            </div>
            <div class="form-inline m-3">
                <br>
                <label class="control-label col-sm-3"  for="treatmentDate">Select treatment date:</label>
            <input class="form-control" type="date" name="treatmentDate" min="{{ Carbon::now()->format('Y-m-d') }}" max="{{ Carbon::now()->addMonths(3)->format('Y-m-d') }}">
                {{-- <p>{{ $num }}</p> --}}
            </div>
            <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="treatmentTime">Select time slot:</label>
                    <select class="form-control" id="treatmentTime">
                        <option>09:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                    </select>
                </div>
            <hr>
            {{-- {{ $date2 }} --}}
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName">
            </div>
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName">
            </div>
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="email">Email:</label>
                <input type="text" class="form-control" id="email">
            </div>
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="tel">Telephone Number:</label>
                <input type="number" class="form-control" id="tel">
            </div>
            <hr>
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="houseNumber">House Name / Number:</label>
                <input type="number" class="form-control" id="houseNumber">
            </div>
            <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="street">Street Name:</label>
                    <input type="number" class="form-control" id="street">
                </div>
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="town">Town / City:</label>
                <input type="text" class="form-control" id="town">
            </div>
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="county">County / State:</label>
                <input type="text" class="form-control" id="county">
            </div>
            <div class="form-inline m-3">
                <label class="control-label col-sm-3" for="postcode">Postcode / Zipcode:</label>
                <input type="text" class="form-control" id="postcode">
            </div>
            <br>
            <hr>
            <div class="form-inline m-3">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
@endsection