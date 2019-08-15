@extends('layouts/app')

@section('content')
    <form-component :appointment-id="{{ $appointment->id }}" :user="{{ $appointment->user_id }}"></form-component>
@endsection