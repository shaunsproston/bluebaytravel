<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Appointment;
use App\Client;
use App\Treatment;
use Illuminate\Support\Facades\View;

class BookingFormController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = auth()->user()->id;
        // dd($authUser);
        
        return View::make('home')->withUserId($authUser);
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
            // 'treatmentTime' => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'tel'           => 'required',
            'house_number'  => 'required',
            'street'        => 'required',
            'town'          => 'required',
            'county'        => 'required',
            'postcode'      => 'required',
        ]);
        
        $client = Client::firstOrCreate([
            'first_name'   => $request->input('first_name'),
            'last_name'    => $request->input('last_name'),
            'email'        => $request->input('email'),
            'tel'          => $request->input('tel'),
            'house_number' => $request->input('house_number'),
            'street'       => $request->input('street'),
            'town'         => $request->input('town'),
            'county'       => $request->input('county'),
            'postcode'     => $request->input('postcode'),
        ]);

        $appointment = Appointment::create([
           'user_id'              => auth()->id(), 
           'treatment_id'         => $request->input('treatmentType'),
           'client_id'            => $client->id,
           'treatment_start_time' => $request->input('treatmentDate') . ' ' . $request->input('treatmentTime') . ':00',
        ]);  

        return Redirect::route('bookings.create')->with('success', 'Booking Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {   
        return View::make('moreInfo')
            ->withData($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return View::make('editform')
                   ->withTreatments(Treatment::all())
                   ->withAppointment($appointment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        // $this->validate($request, [
        //     'treatmentType' => 'required',
        //     'treatmentDate' => 'required',
        //     'treatmentTime' => 'required',
        //     'first_name'    => 'required',
        //     'last_name'     => 'required',
        //     'email'         => 'required|email',
        //     'tel'           => 'required',
        //     'house_number'  => 'required',
        //     'street'        => 'required',
        //     'town'          => 'required',
        //     'county'        => 'required',
        //     'postcode'      => 'required',
        // ]);

        $appointment->client->update([
            'first_name'   => $request->input('first_name'),
            'last_name'    => $request->input('last_name'),
            'email'        => $request->input('email'),
            'tel'          => $request->input('tel'),
            'house_number' => $request->input('house_number'),
            'street'       => $request->input('street'),
            'town'         => $request->input('town'),
            'county'       => $request->input('county'),
            'postcode'     => $request->input('postcode'),
        ]);
        
        $appointment->update([
           'treatment_id'         => $request->input('treatmentType'),
           'treatment_start_time' => $request->input('treatmentDate') . ' ' . $request->input('treatmentTime') . ':00',
        ]);
        // dd($request);
        return Redirect::route('bookings.edit', ['appointment' => $appointment])->with('success', 'Booking Changed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return Redirect::route('bookings.index')->with('success', 'Booking Successfully Removed');
    }
}
