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
    <p>Here You can See All Pending Tickets</p>
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
      <td><button type="button" class="btn btn-success">Accepte</button>
<button type="button" class="btn btn-danger">Refuse</button></td>
    </tr>
    @endforeach
    @endforeach
    
  </tbody>
</table>
</div>

</div>


@endsection