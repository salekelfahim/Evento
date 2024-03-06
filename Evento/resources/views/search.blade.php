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