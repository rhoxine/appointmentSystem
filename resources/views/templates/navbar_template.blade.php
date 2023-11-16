<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    .nav {
        padding: 14px;
        background-color: #ffffff;
    }

    .navbar-nav .nav-link {
        position: relative;
        color: #333;
    }

    .navbar-nav .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0px;
        left: 0;
        width: 0;
        height: 2px;
        background-color: rgba(47, 44, 98, 0.919);
        transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover::before {
        width: 100%;
    }
    
</style>



<nav class="navbar sticky-top navbar-expand-lg nav ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/cliniclogo.png') }}" class="img-fluid banner" alt="Clinic Logo"> Kingdom Animalia
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="/home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/appointment">APPOINTMENT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">ABOUT US</a>
                </li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false" style="margin-right: 50px;">
                @auth
                    {{ Auth::user()->username }}
                @endauth
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('client.appointments') }}">My Appointments</a></li>
                <li><a class="dropdown-item" href="#">Account</a></li>
                <form id="logoutForm" method="post" action="{{ route('logout') }}">
                    @csrf
                    <li><a class="dropdown-item" href="#"
                            onclick="document.getElementById('logoutForm').submit();">
                            Logout<i class="fa-solid fa-right-from-bracket" style="float: right; margin-top: 5px;"></i></a></li>
                </form>
            </ul>
        </div>
    </div>
</nav>

<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
