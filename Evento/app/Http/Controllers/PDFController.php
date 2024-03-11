<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $ticket = Ticket::where('id',$id)->first();
       
        $data = 
            [
                'title' => $ticket->event->title,
                'price' => $ticket->price,
                'type' => $ticket->type
            ];

        $pdf = PDF::loadView('myticket', $data);
        return $pdf->download('EventoTicket.pdf');
    }
}
