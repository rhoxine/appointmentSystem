@extends('templates.about_template')
@section('content')
    @include('templates.navbar_template')
    
<div class="about-container">
                <div class="about-content">
                    <h5 class="title-about">
                        <img src="images/clinic logo.png" alt="">
                        <p>Kingdom Animalia Veterinary Clinic</p>
                    </h5>
                    <p class="text-about">At Kingdom Animalia, we are passionate about pets and committed to their well-being.
                        Our dedicated team of experienced veterinarians and caring staff is here to provide your furry
                        family members with the highest quality of care. From routine check-ups to advanced medical
                        treatments, we offer a wide range of services to keep your pets happy and healthy. Your pets are not
                        just animals; they're part of your family, and we're honored to be your trusted partner in their
                        healthcare. Welcome to Kingdom Animalia, where your pets' well-being is our top priority.</p>
                </div>
    <div class="staff-container">
        <h1 class="header">Organizational Chart</h1>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Janssen Mark O. Lazo</h5>
                        <p class="card-text">Veterinarian</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Jane Marie Tiong-Lazo</h5>
                        <p class="card-text">Veterinarian</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Josef C. Benito</h5>
                        <p class="card-text">Veterinarian</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Fernan R. Alvarado, Jr.</h5>
                        <p class="card-text">Veterinarian</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danillo M. Vallo</h5>
                        <p class="card-text">Vet. Assistant</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Andy J. Pedralvez</h5>
                        <p class="card-text">Groomer</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dexter O. Mengsano</h5>
                        <p class="card-text">Groomer</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agnes L. Cadines</h5>
                        <p class="card-text">Secretary</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
