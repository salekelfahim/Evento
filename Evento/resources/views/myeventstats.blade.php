@extends('layouts.main')

@section('content')



@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif
<div class="containerr">
    <div class="event-details-stats">
        <img id="imgd" src="{{ asset('storage/' . $event->image) }}" alt="Event Image">
        <h1>Title: {{$event->title}}</h1>
        <h5>Date: {{$event->date}} </h5>

        <span><i class="fa-solid fa-hashtag" style="color: #3c6cbe;">{{$event->category->name}}</i></span>

        <h5>Location : {{$event->local}} </h5>
        <h5>Aviable Tickets : </h5>
        @foreach ($event->tickets as $ticket)
        @if ( $ticket->nTickets === 0)
        <h6 style="display: inline;  text-decoration:line-through">-{{ $ticket->type }}: </h6>
        <p style="color:red;display: inline;">{{ $ticket->nTickets }}</p>
        <br>
        @else
        <h6 style="display: inline; ">-{{ $ticket->type }}: </h6>
        <p style="color:green;display: inline;">{{ $ticket->nTickets }}</p>
        <br>
        @endif
        @endforeach
        <p>Description: {{$event->description}} </p>
        <a type="button" href="{{ route('myevents') }}" class="back">Back</a>

    </div>

    <div class="stats">
        <h2 class="stats-message">Event Stats</h2>
        @if ($event->status === 'In Progress' || $event->status === 'Refused')
        <h3 style="margin-top: 10%;">No Stats To Show!</h3>
        <h3>Your Event Isn't Published!</h3>
        @else
        <p>Here You can See All Tickets Buyers</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Handle</th>
                </tr>   
            </thead>
            <tbody>
                <?php $i = 0;
                ?>
                @foreach($tickets as $ticket)
                @foreach($ticket->reservations as $reservation)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{ $reservation->user->name}}</td>
                    <td>{{ $reservation->ticket->type}}</td>
                    <td>{{ $reservation->status}}</td>
                    <td>
                    @if ($reservation->status === 'In Progress')
                        <form method="POST" action="{{ route('acceptTicket', ['reservation' => $reservation]) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Accepte</button>
                        </form>

                        <form method="POST" action="{{ route('refuseTicket', ['reservation' => $reservation]) }}">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $reservation->ticket->id }}">
                            <button type="submit" class="btn btn-danger">Refuse</button>
                        </form>
                        @else
                        -
                        @endif
                    </td>
                </tr>
                @endforeach
                @endforeach

            </tbody>
        </table>
        @endif  
    </div>

</div>


@endsection