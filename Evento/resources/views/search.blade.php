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
        @else <div class="text-center">
        <h2 class="welcome-message">No Results Found For this Title!</h2>
        </div>
        @endif
