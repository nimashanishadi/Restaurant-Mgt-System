<?php

namespace App\Http\Controllers;
use App\Reservation;
use App\Notifications\ReservationConfirmed;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
 
    }

    public function sendMsg(Request $request){

        $reservation = new Reservation();

        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->date_and_time = $request->datepicker ;
        $reservation->massage = $request->message;
        $reservation->status = false;
        $reservation->save();
       
        Toastr::success('your message successflly sent.', 'Success');
        return redirect()->back();


    }

    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());
        $reservation -> save();
       Toastr :: success('Reservation successfully confirmed', 'Success', ["positionClass"=>"toast-top-right"]);
        return redirect()->back();
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('successMsg','Reservation Successful deleted');
    }
}
