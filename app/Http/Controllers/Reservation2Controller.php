<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreReservationRequest;
use Illuminate\Http\Request;
use App\Reservation;
use App\Mail\ReservationAccept;
use Illuminate\Support\Facades\Mail;
use App\User;


class Reservation2Controller extends Controller
{
  public function create()
  {
    return view('reservation.create');


  }
  public function store(Request $request)
  {
    // dd($request);
    $reservation = new Reservation();
    $reservation->person_count = $request->person_count;
    $reservation->time = $request->time;
    $reservation->date = $request->date;
    $reservation->user_id=$request->user()->id;
    $reservation->save();

    // Return redirect('/')->with(['message'=>'Reservation has been made!']);

    Mail::to($request->user())->send(new ReservationAccept($reservation));
    return redirect('/')->with(['message'=>'Your reservation is accepted']);
  }


}
