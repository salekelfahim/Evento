@extends('layouts.main')

@section('content')

@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<div class="welcome-page">
    <h2 class="welcome-message">Add Tickets</h2>
    <p>You Can Add Tickets To Your Event Here! Thank You.</p>
</div>
<main>
    <form method="POST" class="mx-auto" action="{{ route('tickets.create') }}" enctype="multipart/form-data" style="width: 55%;">
        <input type="hidden" name="event_id" value="{{ $event->id }}">
        @csrf
        <div class="mb-3">
            <label for="form4Example1" class="form-label">Number of Tickets:</label>
            <input type="number" id="nTickets" name="nTickets" class="form-control" required>
        </div>


        <div class="mb-3">
            <label for="form4Example3" class="form-label">Price: (DH)</label>
            <input type="number" id="price" name="price" class="form-control" required>
        </div>

        <div class="border p-5 mb-4">
            <label class="form-label">Type:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Standard" name="type" id="type_standard">
                <label class="form-check-label" for="type_standard">Standard</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="VIP" name="type" id="type_vip">
                <label class="form-check-label" for="type_vip">VIP</label>
            </div>
        </div>


        <button name="submit" type="submit" class="btn btn-dark float-end">Add Tickets</button>
    </form>
</main>


@endsection