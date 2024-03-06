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

<div class="event-details">
    <img id="imgd" src="{{ asset('storage/' . $event->image) }}" alt="Event Image">
        <h1>Title: {{$event->title}}</h1>
        <h5>Date: {{$event->date}} </h5>

                <span><i class="fa-solid fa-hashtag" style="color: #3c6cbe;">{{$event->category->name}}</i></span>
        
        <h6>Location : {{$event->local}} </h6>
        <p>Description: {{$event->description}} </p>

        <a class="back" href="/">Reserve</a>
        <a type="button" href="/" class="btn btn-light">Back</a>

</div>

@endsection