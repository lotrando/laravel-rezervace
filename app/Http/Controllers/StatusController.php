<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function status(Reservation $reservation, Request $request)
    {
        if (Auth::user()->id === $reservation->user_id) {
            return view('user.reservations.edit', ['reservation' => $reservation]);
        }
        $request->session()->flash('error', 'This reservation do not edit!');
        return redirect(route('user.reservations.index'));
    }
}
