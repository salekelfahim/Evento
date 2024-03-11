@extends('layouts.admin')

@section('content')

<!-- Fact 3 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h3 class="fs-6 text-secondary mb-2 text-uppercase text-center">Our Stats</h3>
        <h2 class="mb-4 display-5 text-center">You Can See All Statics Here.</h2>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row gy-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6">
        <img class="img-fluid rounded" loading="lazy" src="{{ asset('images/evento.jpg') }}" alt="">
      </div>
      <div class="col-12 col-lg-6">
        <div class="row justify-content-xl-end">
          <div class="col-12 col-xl-11">
            <div class="row gy-4 gy-sm-0 overflow-hidden">
              <div class="col-12 col-sm-6">
                <div class="card border-0 border-bottom border-primary shadow-sm mb-4">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <h3 class="display-2 fw-bold mb-2">{{$acceptedEvents->count()}}</h3>
                    <p class="fs-5 mb-0 text-secondary">Approved Events</p>
                  </div>
                </div>
                <div class="card border-0 border-bottom border-primary shadow-sm">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <h3 class="display-2 fw-bold mb-2">{{$pendingEvents->count()}}</h3>
                    <p class="fs-5 mb-0 text-secondary">Pending Events</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="card border-0 border-bottom border-primary shadow-sm mt-lg-6 mt-xxl-8 mb-4">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <h3 class="display-2 fw-bold mb-2">{{$users->count()}}</h3>
                    <p class="fs-5 mb-0 text-secondary">Users</p>
                  </div>
                </div>
                <div class="card border-0 border-bottom border-primary shadow-sm">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <h3 class="display-2 fw-bold mb-2">{{$organisateurs->count()}}</h3>
                    <p class="fs-5 mb-0 text-secondary">Organisateurs</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection