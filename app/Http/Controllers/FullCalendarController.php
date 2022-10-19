<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index()
    {
        $events = [];
        $bookings = Bike::all();

        foreach($bookings as $booking) {
            $events [] = [
                'title'             => $booking->item->name.' · '.$booking->user->user_name,
                'color'             => $booking->item->color,
                'textColor'         => '#ffffff',
                'start'             => $booking->date_start,
                'end'               => date('Y-m-d', strtotime($booking->date_end . ' +1 day')),
            ];
        }

        foreach($bookings as $booking) {
            $events [] = [
                'title'             => 'Servisní den · '.$booking->item->name,
                'borderColor'       => $booking->item->color,
                'color'             => '#eeeeee',
                'textColor'         => '#222222',
                'start'             => $booking->serviceday,
                'end'               => $booking->serviceday,
            ];
        }

		//dd($events);
        return view('fullcalendar', ['events' => $events]);
    }
}
