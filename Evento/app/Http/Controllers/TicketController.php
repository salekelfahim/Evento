<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
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
        try {
            $request->validate([
                'nTickets' => 'required|integer|min:1',
                'price' => 'required|numeric|min:1',
                'type' => 'required|in:Standard,VIP',
            ]);

            $ticket = new Ticket([
                'nTickets' => $request->input('nTickets'),
                'price' => $request->input('price'),
                'event_id' => $request->input('event_id'),
                'type' => $request->input('type'),
            ]);

            $ticket->save();

            return redirect()->back()->with('success', 'Tickets added successfully!');
            
        } catch (ValidationException $e) {

            return ['message' => $e->errors()];
        }
    }
}
