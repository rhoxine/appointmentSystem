{{-- With auth --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

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
        background-color: rgba(57, 98, 44, 0.919);
        transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover::before {
        width: 100%;
    }
</style>


<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg nav ">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/cliniclogo.png') }}" class="img-fluid banner" alt="Clinic Logo"> Kingdom Animalia
        </a>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="/homepage">HOME</a>
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
        @auth
            <div class="dropdown">
            </div>

            <div class="dropdown">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-mdb-toggle="dropdown"
                    aria-expanded="false" style="margin-right: 50px;">
                    {{ Auth::user()->username }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('client.appointments') }}">My Appointments</a></li>
                    <li><a class="dropdown-item" href="#">Account</a></li>
                    <form id="logoutForm" method="post" action="{{ route('logout') }}">
                        @csrf
                        <li><a class="dropdown-item" href="#"
                                onclick="document.getElementById('logoutForm').submit();">
                                Logout<i class="fa-solid fa-right-from-bracket"
                                    style="float: right; margin-top: 5px;"></i></a></li>
                    </form>
                </ul>
            </div>
        @endauth

        @guest
            <div class="ml-auto">
                <a class="btn btn-secondary btn-sm px-3 me-2" href="/login_page">Login</a>
                <a class="btn btn-primary btn-sm me-3" href="/register">Sign Up</a>
            </div>
        @endguest
    </div>

    </div>

</nav>




<body>
    @yield('content')

</body>

</html>
