@extends('layouts.main')

@section('content')


<style>
    .event-details {
        text-align: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
        max-width: 600px;
        margin: 20px auto;
    }

    .event-details h1 {
        font-size: 32px;
        color: #333;
        margin-bottom: 10px;
    }

    .event-details p {
        font-size: 18px;
        color: #555;
        margin-bottom: 15px;
    }

    .event-details img {
        max-width: 100%;
        border-radius: 8px;
        margin-top: 20px;
    }

    .back {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        display: inline-block;
        margin-top: 20px;
    }

    #imgd {
        width: 80%;
    }
</style>

@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif

<div class="event-details">
    <img id="imgd" src="{{ asset('storage/' . $event->image) }}" alt="Event Image">
    <h1>Title: {{$event->title}}</h1>
    <h5>Date: {{$event->date}} </h5>

    <span><i class="fa-solid fa-hashtag" style="color: #3c6cbe;">{{$event->category->name}}</i></span>

    <h6>Location : {{$event->local}} </h6>
    <p>Description: {{$event->description}} </p>

    <button type="button" class="back" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Reserver </button> <a type="button" href="/" class="btn btn-light">Back</a>

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
                            <option value="{{ $ticket->id }}">{{ $ticket->type }} - {{ $ticket->price }}DH</option>
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