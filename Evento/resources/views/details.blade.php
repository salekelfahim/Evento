@extends('layouts.main')

@section('content')



@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger" id="alert">
    {{ session('error') }}
</div>
@endif

<div class="event-details">
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
    @if ( $tTickets != 0)
    <button type="button" class="back" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Reserver </button>
    @else
    <button class="btn btn-danger">Sold Out</button>
    @endif
    <a type="button" href="/" class="btn btn-light">Back</a>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose Your Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('createReservation') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <div class="modal-body">
                        <label for="form4Example3" class="form-label">Type:</label>
                        <select id="type" name="type" class="form-control">
                            @foreach ($event->tickets as $ticket)
                            @if ( $ticket->nTickets != 0)
                            <option value="{{ $ticket->id }}">{{ $ticket->type }} - {{ $ticket->price }}DH</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Reserve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection