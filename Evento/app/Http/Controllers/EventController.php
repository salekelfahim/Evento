<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    public function ShowHome()
    {
        $events = Event::where('status', 'Accepted')->get();
        $categories = Category::all();

        return view('home', compact('events', 'categories'));
    }

    public function ShowAdd()
    {
        $categories = Category::all();

        return view('addEvent', compact('categories'));
    }

    public function CreateEvent(Request $request)
    {

        $messages = [
            'title.required' => 'You need to add a Title.',
            'description.required' => 'You need to add a Description.',
            'date.required' => 'You need to add a Date.',
            'date.date' => 'Invalid date format.',
            'local.required' => 'You need to add a Location.',
            'image.required' => 'You need to upload an Image.',
            'image.image' => 'Invalid image format.',
            'description.string' => 'The Description must be a Text.',
            'category.required' => 'You need to choose a Category.',
        ];

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'local' => 'required|string',
            'image' => 'required|image',
            'category' => 'required',
        ], $messages);


        $image = $request->file('image')->store('images', 'public');

        $event = new Event([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'local' => $request->input('local'),
            'image' => $image,
            'acceptation' => $request->input('acceptation'),
            'user_id' => auth()->id(),
            'category_id' => $request->input('category'),
        ]);

        $event->save();

        if ($event != NULL) {
            return redirect()->route('addTicket', ['id' => $event->id])->with('success', 'Event added successfully!');
        } else {

            return redirect()->back()->withErrors(['message' => 'Error']);
        }
    }

    public function details($id)
    {
        $event = Event::find($id);

        $tTickets = DB::table('tickets')->where('event_id', $id)->sum('nTickets');

        return view('details', compact('event', 'tTickets'));
    }

    public function searchEvents(Request $request)
    {
        $keyword = $request->input('title_s');
        if ($keyword === '') {
            $events = Event::get();
        } else {

            $events = Event::where('title', 'like', '%' . $keyword . '%')
                ->where('status', 'Accepted')
                ->get();
        }

        return view('search')->with(['events' => $events, 'keyword' => $keyword]);
    }

    public function category($id)
    {
        $category = Category::find($id);

        $events = DB::table('events')->where('category_id', $id)->where('status', 'Accepted')->get();


        return view('category', compact('events', 'category'));
    }

    public function EventsUser()
    {   
        $user = auth()->id();
        $events = Event::where('user_id', $user)->get();

        return view('myevents', compact('events'));
    }

    public function EventUserStats($id)
    {
        $event = Event::find($id);
        $tickets = Ticket::where('event_id', $id)->get();
        $tTickets = $tickets->sum('nTickets');
        

        return view('myeventstats', compact('event', 'tTickets', 'tickets'));
    }
}
