@extends('layouts/app')

@section('content')
    <moreinfo-component :appointment-id="{{ $appointment->id }}" :user="{{ $appointment->user_id }}"></moreinfo-component>
@endsection