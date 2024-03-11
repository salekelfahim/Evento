@extends('layouts.admin')

@section('content')

@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif

<main style="margin-right: 30%;">
    <div class="container pt-2">
        <div class="welcome-page" style="   margin-bottom: 10%; margin-left: 30%">
            <h2 class="welcome-message">Events Page</h2>
            <p>You Can See here All Pending Events</p>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Event Owner</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td> {{$event->title}}</td>
                    <td> {{$event->user->name}}</td>
                    <td> {{$event->category->name}}</td>
                    <td>{{$event->status}}</td>
                    <td>
                        <form method="POST" action="{{ route('approveEvent', $event->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>

                        <form method="POST" action="{{ route('refuseEvent', $event->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Refuse</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
</main>

@endsection