@extends('layouts.main')

@section('content')

<div class="welcome-page">
    <h2 class="welcome-message">Add New Event</h2>
    <p>You Can Add Your Event Here! Thank You.</p>
</div>
<main>
    <form method="post" class="mx-auto" action="{{ route('event.create') }}" enctype="multipart/form-data"  style="width: 55%;">
        @csrf
        <div class="mb-3">
            <label for="form4Example1" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="form4Example3" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="form4Example3" class="form-label">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="form4Example3" class="form-label">Location</label>
            <input type="text" id="local" name="local" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="form4Example3" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="form4Example3" class="form-label">Acceptation:(You can choose if you want the Acceptation of the Tickets to be Auto or Manuelle)</label>
            <select id="acceptation" name="acceptation" class="form-control" required>
                <option value="0">Auto</option>
                <option value="1">Manuelle</option>
            </select>
        </div>

        <div class="border p-5 mb-4">
            <label class="form-label">Categories: (You can choose only one Category)</label>

            @foreach($categories as $category)
            <div class="form-check">
                <input class="form-check-input" type="radio" value="{{ $category->id }}" name="category" id="category_{{ $category->id }}">
                <label class="form-check-label" for="category_{{ $category->id }}">
                    {{ $category->name }}
                </label>
            </div>
            @endforeach

        </div>


        <button name="submit" type="submit" class="btn btn-dark float-end">Add Event</button>
    </form>
</main>


@endsection