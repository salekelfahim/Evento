<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function createReservation(Request $request)
    {

        $eventId = $request->input('event_id');
        $event = Event::find($eventId);
        $ticketId = $request->input('type');

        $checkReservation = Reservation::where('user_id', auth()->id())
            ->where('ticket_id', $ticketId)
            ->first();

        if ($checkReservation) {
            return redirect()->back()->with('error', 'You have already reserved this ticket.');
        }

        $nTickets = DB::table('tickets')->select('nTickets')->where('id', $ticketId)->value('nTickets');

        if ($event->acceptation === 'Auto') {

            $reservationStatus = 'Accepted';
        } else {

            $reservationStatus = 'In Progress';
        }

        $reservation = new Reservation([
            'ticket_id' => $ticketId,
            'user_id' => auth()->id(),
            'status' => $reservationStatus,
        ]);

        if ($reservation != NULL) {

            $aTickets = $nTickets - 1;

            DB::table('tickets')->where('id', $request->input('type'))->update(['nTickets' => $aTickets]);

            $reservation->save();

            return redirect()->back()->with('success', 'Ticket Reserved successfully! You can check it Now in Reservations Page');
        } else {

            return redirect()->back()->with('error', 'Ticket Reservation Error!');
        }
    }

    public function ShowReservations()
    {
        $user = auth()->id();
        $reservations = Reservation::where('user_id', $user)->get();

        return view('myreservations', compact('reservations'));
    }
}
