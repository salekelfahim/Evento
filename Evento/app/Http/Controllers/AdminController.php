<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ShowStats()
    {
        $acceptedEvents = Event::where('status', 'Accepted');
        $pendingEvents = Event::where('status', 'In Progress');

        $users = User::where('role_id', 3);
        $organisateurs = User::where('role_id', 2);

        return view('stats', compact('acceptedEvents', 'pendingEvents', 'users', 'organisateurs'));
    }
}
