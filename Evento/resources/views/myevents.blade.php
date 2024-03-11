@extends('layouts.main')

@section('content')

<div class="welcome-page">
    <h2 class="welcome-message">Welcome, {{ auth()->user()->name }}</h2>
    <p>Here You can See All Your Events</p>
</div>
 
<main class="d-flex flex-column align-items-center">
    <div id="search_result" class="row hidden-md-up ms-5 gap-4">
        @foreach($events as $event)
        <div class="cart">
            <img id="img" src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-fluid">
            <h3>
                {{$event->title}}
            </h3>
            <p>
                {{$event->description}}
            </p>
            <h5>Status: </h5>
            @if ($event->status === 'Accepted') 
            <p style="color:green;">•{{$event->status}}</p>
            @elseif ($event->status === 'Refused')
            <p style="color:red;">•{{$event->status}}</p>
            @else
            <p >•{{$event->status}}</p>
            @endif
            <a href="{{ route('myeventstats', ['id' => $event->id]) }}">Stats</a>
        </div>
        @endforeach
    </div>
  
</main>


@endsection