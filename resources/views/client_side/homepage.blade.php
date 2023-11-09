@extends('templates.home_template')
@section('content')
    @include('templates.navbar_template')


    <div class="image-container">
        <div class="tagline">
            <p class="tag1">Kingdom Animalia,</p>
            <em>
                <p class="tag2">The Kingdom they deserve.</p>
            </em>
        </div>
    </div>
    <div class="service-container">
        <h1 class="heading">Our Services</h1>
        <div class="services">
            <div class="card">
                <img src="images/treatment.jpg" alt="" class="image">
                <h5>Treatment</h5>
            </div>
            <div class="card">
                <img src="images/diagnostics.jpg" alt="" class="image">
                <h5>Diagnostics</h5>
            </div>
            <div class="card">
                <img src="images/confinement.jpg" alt="" class="image">
                <h5>Confinement</h5>
            </div>
            <div class="card">
                <img src="images/grooming.jpg" alt="" class="image">
                <h5>Grooming</h5>
            </div>
            <div class="card">
                <img src="images/vaccination.jpg" alt="" class="image">
                <h5>Vaccination</h5>
            </div>
            <div class="card">
                <img src="images/deworming.jpg" alt="" class="image">
                <h5>Deworming</h5>
            </div>
            <div class="card">
                <img src="images/home-service.jpg" alt="" class="image">
                <h5>Home Services</h5>
            </div>
            <div class="card">
                <img src="images/surgical procedures.jpg" alt="" class="image">
                <h5>Surgical Procedures</h5>
            </div>
        </div>
    </div>

    <footer class="text-center text-lg-start text-muted">
       
        <div class="container p-4">
           
            <div class="row">
               
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">

                    <h5 class="text-uppercase">Contact</h5>
                    <p>
                        <i class="fa fa-phone"></i>
                        0927 077 5130
                    </p>
                    <p>
                        <i class="fa fa-envelope"></i>
                        kingdomanimalia@gmai.com
                    </p>
                </div>
                
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Location</h5>
                    <p>
                        <i class="fa fa-location-dot"></i>
                        St. Francis Bldg, Mcarthur Highway,
                        Brgy. San Vicente
                        Urdaneta City
                        2428 Pangasinan
                        Philippines
                    </p>
                </div>
           
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Working Hours</h5>

                    <p class="bhours">
                        <i class="fa fa-clock me-2"></i>
                        Monday - Saturday: 9:00 AM – 6:00 PM
                    </p>
                    <p class="bhours mt-2">
                        <i class="fa fa-clock me-2"></i>
                        Sunday: 9:00 AM – 4:00 PM
                    </p>


                </div>
            </div>


        </div>

    </footer>

    <div class="text-center p-3" style="background-color: #779ad1;">
        Copyright © 2023. All Rights Reserved.
        <a class="text-dark">TechHive Inc.</a>
    </div>
    </footer>
@endsection
