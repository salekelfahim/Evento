@extends('layouts.main')

@section('content')

<div class="welcome-page">
        <h2 class="welcome-message">Welcome to Evento</h2>
        <p>Enjoy latest Events</p>
        <div style="width :30%" class="input-group rounded">
  <input type="search" id="search_title" class="form-control rounded" placeholder="Search" name="titel_s" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
    </div>
    <main>
    <div id="search_result"  class="row hidden-md-up ms-5">
            <div class="cart">
                <img id="img" src="images/Wikipedia_Logo_1.0.png" alt="Wiki">
                <h3>
                    
                </h3>
                <p>
                    
                </p>
                <a href="details">Voir plus</a>
            </div>
        
            <div class="cart">
                <img id="img" src="images/Wikipedia_Logo_1.0.png" alt="Wiki">
                <h3>
                    
                </h3>
                <p>

                </p>
                <a href="details">Voir plus</a>
            </div>
        
        <div class="welcome-page">
        <h2 class="welcome-message">Categories</h2>
        <div class="row hidden-md-up mt-4">
    

          <div class="col-md-4 mb-2">
          <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"></h5>

              </div>
          </div>
        </div>



    
          </div>
    </div>
    </main>

    @endsection
