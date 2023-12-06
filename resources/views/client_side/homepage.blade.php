@extends('templates.home_template')
@section('content')
    @include('templates.navbar_template')



    <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/background.jpg" class="d-block w-100" alt="Wild Landscape" />
            </div>
            <div class="carousel-item">
                <img src="images/banner2.jpg" class="d-block w-100" alt="Camera" />
            </div>
            <div class="carousel-item">
                <img src="images/banner3.jpg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators"
            data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="service-container">
        <h1 class="heading">Our Services</h1>
        <div class="services">
            @foreach ($services_list as $service)
                <div class="card">
                    <img src="{{ asset('storage/' . $service->service_img) }}" alt="Service Image" class="image">
                    <h5>{{ $service->service_name }}</h5>
                </div>
            @endforeach

            @if ($services_list->isEmpty())
                <p>No services found</p>
            @endif

        </div>
    </div>

    <footer class="text-center text-lg-start text-muted">

        <div class="container p-4">

            @foreach ($footers as $footer)
                <div class="row">

                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">

                        <h5 class="text-uppercase">Contact</h5>

                        <p>
                            <i class="fa fa-phone"></i>
                            {{ $footer->contact_number }}
                        </p>
                        <p>
                            <i class="fa fa-envelope"></i>
                            {{ $footer->email_address }}
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Location</h5>
                        <p>
                            <i class="fa fa-location-dot"></i>
                            {{ $footer->location }}
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Working Hours</h5>

                        <p class="bhours">
                            <i class="fa fa-clock me-2"></i>
                            {{ $footer->work_hours }}
                        </p>
                    </div>
                </div>
            @endforeach


        </div>

    </footer>

    <div class="text-center p-3" style="background-color: #779ad1;">
        {{ $footer->copyright }}
        <a class="text-dark">TechHive Inc.</a>
    </div>
    </footer>
@endsection
