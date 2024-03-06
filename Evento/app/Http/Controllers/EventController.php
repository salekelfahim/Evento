<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    public function ShowHome()
    {
        $events = Event::all();

        return view('home', compact('events'));
    }

    public function ShowAdd()
    {
        $categories = Category::all();

        return view('addEvent', compact('categories'));
    }

    public function CreateEvent(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'date' => 'required|date',
                'local' => 'required|string',
                'image' => 'required|image',
                'acceptation' => 'required',
                'category_id' => 'required',
            ]);

            $image = $request->file('image')->store('images', 'public');
            // dd(auth()->id());
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

            return redirect()->route('addTicket', ['id' => $event->id]);

        } catch (ValidationException $e) {

            return ['message' => $e->errors()];
        }
    }

    public function details($id)
    {
        $event = Event::find($id);

        return view('details', compact('event'));
    }

    public function searchEvents(Request $request)
    {
        $keyword = $request->input('title_s');
        if ($keyword === '') {
            $events = Event::get();
        } else {

            $events = Event::where('title', 'like', '%' . $keyword . '%')
                ->get();
        }

        return view('search')->with(['events' => $events, 'keyword' => $keyword]);
    }
}
