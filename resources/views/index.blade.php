@extends('layouts/app')

@section('content')
<div class="container h5 p-5">
    <h1>Bookings Page</h1>
</div>
<hr>
<div class="container">
    <a href="{{ route('appointments') }}"><button type="button" class="btn btn-info ">All Bookings</button></a>
</div>
<hr>
@endsection