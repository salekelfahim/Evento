@extends('layouts.main')

@section('content')

<div class="welcome-page">
    @if(auth()->check())
    <h2 class="welcome-message">Welcome, {{ auth()->user()->name }}</h2>
    @else
    <h2 class="welcome-message">Welcome to Evento</h2>
    @endif
    <p>Enjoy latest Events</p>
    <div style="width :30%" class="input-group rounded">
        <input type="search" id="search_title" class="form-control rounded" placeholder="Search" name="title_s" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </span>
    </div>
</div>
<main class="d-flex flex-column align-items-center">
    <div id="search_result" class="row hidden-md-up ms-5">
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
    </div>
    <br>
    <br>
    <div class="welcome-page">
        <h2 class="welcome-message">Categories</h2>
        <div class="row hidden-md-up mt-4">
            @foreach($categories as $category)
            <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <a class="text-decoration-none text-dark" href="{{ route('category', ['id' => $category->id]) }}"><h5 class="card-title "> {{$category->name}}</h5></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</main>


@endsection