<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

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
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'date' => 'required|date',
        //     'local' => 'required|string',
        //     'image' => 'required|image|',
        //     'acceptation' => 'required',
        //     'category_id' => 'required',
        // ]);

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

        return redirect()->route('home')->with('success', 'Event created successfully!');
    }
}
