<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/main.css')

</head>

<body>
    <header>
        <a href="/">
            <h1>Evento</h1>
        </a>
        <nav>

            @if(auth()->check())
            @if(auth()->user()->role_id === 2)
            <a href="{{ route('addEvent') }}">Add Event</a>
            <a href="{{ route('myevents') }}">My Events</a>
            @endif
            <a href="{{ route('myreservations') }}">My Reservations</a>
            <a href="{{ route('logout') }}">Logout</a>
            @else
            <a href="{{ route('login') }}">Log in</a>
            <a href="{{ route('register') }}">Sign Up</a>
            @endif
        </nav>
    </header>

    <body>
        @yield('content')

        <footer>
            <p>&copy; 2024 Evento. All Rights Reserved </p>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        @vite('resources/js/search.js')
    </body>

</html>