<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function createReservation(Request $request)
    {

        $eventId = $request->input('event_id');
        $event = Event::find($eventId);

        if ($event->acceptation === 'Auto') {

            $reservationStatus = 'Accepted';

        } else {
            $reservationStatus = 'In Progress';
        }

        $reservation = new Reservation([
            'ticket_id' => $request->input('type'),
            'user_id' => auth()->id(),
            'status' => $reservationStatus,
        ]);

        $reservation->save();

        return redirect()->back()->with('success', 'Ticket Reserved successfully! You can check it Now in Reservations Page');
    }
}
