<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/admin.css')

</head>

<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav
       id="sidebarMenu"
       class="collapse d-lg-block sidebar collapse bg-dark" style="margin-top: 7%"
       >
    <div class="position-sticky bg-dark"   >
      <div class="list-group list-group-flush mx-3 mt-4">
        <a
           href="{{route ('stats')}}"
           class="list-group-item list-group-item-action py-2 ripple text-white bg-dark"
           ><i class="fas fa-chart-line fa-fw me-3"></i
          ><span>Analytics</span></a
          >
        <a
           href="{{route ('events')}}"
           class="list-group-item list-group-item-action py-2 ripple text-white bg-dark"
           ><i class="fas fa-calendar fa-fw me-3"></i
          ><span>Events</span></a
          >
        <a
           href="{{route ('users')}}"
           class="list-group-item list-group-item-action py-2 ripple text-white bg-dark"
           ><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a
          >
        <a
           href="{{ route('addcategory') }}"
           class="list-group-item list-group-item-action py-2 ripple text-white bg-dark "
           ><i class="fas fa-money-bill fa-fw me-3"></i><span>Categories</span></a
          >
      </div>
    </div>
  </nav>

  <!-- Sidebar -->

  <!-- Navbar -->


    <header>
        <a href="/">
            <h1>Evento</h1>
            <h4>Admin Dashboard</h4>
        </a>
        <nav>
            <a href="{{ route('logout') }}">Logout</a>
        </nav>
    </header>
    </header>
  <!-- Navbar -->

<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
  @yield('content')
  </div>
</main>
<!--Main layout-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        @vite('resources/js/admin.js')

</html>