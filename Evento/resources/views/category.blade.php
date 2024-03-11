@extends('layouts.main')

@section('content')
<div class="welcome-page">
    <h2 class="welcome-message">{{ $category->name }}</h2>
    <p>Enjoy latest Events</p>
    <br>
</div>
<main class="d-flex flex-column align-items-center">
    <div id="search_result" class="row hidden-md-up ms-5 gap-4">
    @if ($events->isNotEmpty())
        @foreach($events as $event)
        <div class="cart">
            <img id="img" src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-fluid">
            <h3>
                {{$event->title}}
            </h3>
            <p>
                {{$event->description}}
            </p>
            <a href="{{ route('details', ['id' => $event->id]) }}">Details</a>
        </div>
        @endforeach
        @else
        <div style="margin-bottom: 37%;" class="text-center">
        <h2 style="margin-bottom: 37%;" class="welcome-message">No Events in This Category!</h2>
        </div>
        @endif
        </div>
    <a type="button" href="/" class="btn btn-dark m-5">Back</a>
    
    
</main>


@endsection