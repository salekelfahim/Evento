<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TicketController extends Controller
{
    public function ShowAddTickets($id)
    {
        $event = Event::findOrFail($id);

        return view('addTicket', ['event' => $event]);
    }

    public function createTickets(Request $request)
    {
        $messages = [
            'nTickets.required' => 'You need to add a Tickets Number.',
            'nTickets.integer' => 'Tickets Number must be an integer.',
            'nTickets.min' => 'Tickets Number must be at least 1.',
            'price.required' => 'You need to add a Price.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price must be at least 1.',
            'type.required' => 'You need to select a Ticket Type.',
            'type.in' => 'Invalid Ticket Type. Please choose either Standard or VIP.',
        ];

        $request->validate([
            'nTickets' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'type' => 'required|in:Standard,VIP',
        ], $messages);

        $checkTicket = Ticket::where('type', $request->input('type'))
            ->where('event_id', $request->input('event_id'))
            ->first();

        if ($checkTicket) {
            
            return redirect()->back()->with('error', 'Ticket already exists for this event and type!');
        }

        $ticket = new Ticket([
            'nTickets' => $request->input('nTickets'),
            'price' => $request->input('price'),
            'event_id' => $request->input('event_id'),
            'type' => $request->input('type'),
        ]);

        $ticket->save();
        if ($ticket != NULL) {
            return redirect()->back()->with('success', 'Tickets added successfully! You can Add Another Tickets Type');
        } else {

            return redirect()->back()->withErrors(['message' => 'Error']);
        }
    }

    public function acceptTicket(Reservation $reservation)
    {
        $reservation->update(['status' => 'Accepted']);

        return redirect()->back();
    }

    public function refuseTicket(Reservation $reservation)
    {
        $reservation->update(['status' => 'Refused']);

        $nTickets = DB::table('tickets')->select('nTickets')->where('id', $reservation->ticket->id)->value('nTickets');

        $aTickets = $nTickets + 1;

        DB::table('tickets')->where('id', $reservation->ticket->id)->update(['nTickets' => $aTickets]);

        return redirect()->back();
    }
}
