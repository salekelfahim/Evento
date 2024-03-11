@extends('layouts.main')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css?family=Oswald');

.fl-left {
    float: left
}

.fl-right {
    float: right
}


.row {
    overflow: hidden
}

.card {
    display: table-row;
    width: 49%;
    background-color: #fff;
    color: #989898;
    margin-bottom: 10px;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    border-radius: 4px;
    position: relative
}

.card+.card {
    margin-left: 2%
}

.date {
    display: table-cell;
    width: 25%;
    position: relative;
    text-align: center;
    border-right: 2px dashed #dadde6
}

.date:before,
.date:after {
    content: "";
    display: block;
    width: 30px;
    height: 30px;
    background-color: #DADDE6;
    position: absolute;
    top: -15px;
    right: -15px;
    z-index: 1;
    border-radius: 50%
}

.date:after {
    top: auto;
    bottom: -15px
}

.date time {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
}

.date time span {
    display: block
}

.date time span:first-child {
    color: #2b2b2b;
    font-weight: 600;
    font-size: 250%
}

.date time span:last-child {
    text-transform: uppercase;
    font-weight: 600;
    margin-top: -10px
}

.card-cont {
    display: table-cell;
    width: 75%;
    font-size: 85%;
    padding: 10px 10px 30px 50px
}

.card-cont h3 {
    color: #3C3C3C;
    font-size: 130%
}

.row:last-child .card:last-of-type .card-cont h3 {
    text-decoration: line-through
}

.card-cont>div {
    display: table-row
}

.card-cont .even-date i,
.card-cont .even-info i,
.card-cont .even-date time,
.card-cont .even-info p {
    display: table-cell
}

.card-cont .even-date i,
.card-cont .even-info i {
    padding: 5% 5% 0 0
}

.card-cont .even-info p {
    padding: 30px 50px 0 0
}

.card-cont .even-date time span {
    display: block
}

.card-cont a {
    display: block;
    text-decoration: none;
    width: 80px;
    height: 30px;
    background-color: #D8DDE0;
    color: #fff;
    text-align: center;
    line-height: 30px;
    border-radius: 2px;
    position: absolute;
    right: 10px;
    bottom: 10px
}

.row:last-child .card:first-child .card-cont a {
    background-color: #037FDD
}

.row:last-child .card:last-child .card-cont a {
    background-color: #F8504C
}

@media screen and (max-width: 860px) {
    .card {
        display: block;
        float: none;
        width: 100%;
        margin-bottom: 10px
    }
    .card+.card {
        margin-left: 0
    }
    .card-cont .even-date,
    .card-cont .even-info {
        font-size: 75%
    }
}
</style>



<section class="container">
<div class="welcome-page">
    <h2 class="welcome-message">My Reservations</h2>
    <p>You Can See All Your Reservations Here.</p>
</div>
  <div class="row">
  @foreach($reservations as $reservation)
    <article class="card fl-left" style="margin-bottom: 20%;">
      <section class="date">
        <time datetime="23th feb">
          <span>Eve</span><span>Nto</span>
        </time>
      </section>
      <section class="card-cont">
        <small>{{$reservation->ticket->event->category->name}}</small>
        <h3>{{$reservation->ticket->event->title}}</h3>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
           <span>{{$reservation->ticket->event->date}}</span>
         </time>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p>
          {{$reservation->ticket->event->local}}</p>
        </div>
        <a href="#">{{$reservation->status}}</a>
        @if ($reservation->status === 'Accepted')
        <a href="{{ route('generatePDF', $reservation->ticket_id) }}">Download</a>
        @endif
      </section>
    </article>
    @endforeach
    </div>
    </section>
    <!-- <article class="card fl-left">
      <section class="date">
        <time datetime="23th feb">
          <span>23</span><span>feb</span>
        </time>
      </section>
      <section class="card-cont">
        <small>dj khaled</small>
        <h3>corner obsest program</h3>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
           <span>wednesday 28 december 2014</span>
           <span>08:55pm to 12:00 am</span>
         </time>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p>
            nexen square for people australia, sydney
          </p>
        </div>
        <a href="#">tickets</a>
      </section>
    </article>
  </div>
  <div class="row">
    <article class="card fl-left">
      <section class="date">
        <time datetime="23th feb">
          <span>23</span><span>feb</span>
        </time>
      </section>
      <section class="card-cont">
        <small>dj khaled</small>
        <h3>music kaboom festivel</h3>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
           <span>wednesday 28 december 2014</span>
           <span>08:55pm to 12:00 am</span>
         </time>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p>
            nexen square for people australia, sydney
          </p>
        </div>
        <a href="#">booked</a>
      </section>
    </article>
    <article class="card fl-left">
      <section class="date">
        <time datetime="23th feb">
          <span>23</span><span>feb</span>
        </time>
      </section>
      <section class="card-cont">
        <small>dj khaled</small>
        <h3>hello dubai festivel</h3>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
           <span>wednesday 28 december 2014</span>
           <span>08:55pm to 12:00 am</span>
         </time>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p>
            nexen square for people australia, sydney
          </p>
        </div>
        <a href="#">cancel</a>
      </section>
    </article>
  </div>
</section> -->

@endsection