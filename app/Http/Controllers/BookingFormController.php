<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Client;
use App\Treatment;
use View;

class BookingFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return View::make('bookingform')->withTreatments(Treatment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return View::make('bookingform')->withTreatments(Treatment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'treatmentType' => 'required',
             'treatmentDate' => 'required',
             'treatmentTime' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'houseNumber' => 'required',
            'street' => 'required',
            'town' => 'required',
            'county' => 'required',
            'postcode' => 'required',
        ]);

        $client = new Client;
        $client->firstName = $request->input('firstName');
        $client->lastName = $request->input('lastName');
        $client->email = $request->input('email');
        $client->tel = $request->input('tel');
        $client->houseNumber = $request->input('houseNumber');
        $client->street = $request->input('street');
        $client->town = $request->input('town');
        $client->county = $request->input('county');
        $client->postcode = $request->input('postcode');
        $client->save();

        $appointment = new Appointment;
        $appointment->treatment_id = $request->input('treatmentType');
        $appointment->client_id = $client->id;
        $appointment->treatment_start_time = $request->input('treatmentDate') . ' ' . $request->input('treatmentTime') . ':00';
        $appointment->save();

        return redirect('/bookings/create')->with('success', 'Booking Successful');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
