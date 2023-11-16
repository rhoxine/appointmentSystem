<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

    <title>Admin</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --body-color: #E4E9F7;
        --sidebar-color: #FFF;
        --primary-color: #475ca2;
        --primary-color-light: #F6F5FF;
        --toggle-color: #DDD;
        --text-color: #707070;

        --tran-02: all 0.2s ease;
        --tran-03: all 0.3s ease;
        --tran-04: all 0.4s ease;
        --tran-05: all 0.5s ease;
    }

    body {
        height: 100vh;
        background: var(--body-color);
    }

    .custom-sidebar .text {
        font-size: 14px;
        font-weight: 500;
        color: var(--text-color);
        transition: var(--tran-04);
        white-space: nowrap;
        opacity: 1;
    }

    .custom-sidebar .image {
        min-width: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Sidebar */

    .custom-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background: var(--sidebar-color);
        padding: 10px 14px;
        transition: var(--tran-05);
        z-index: 100;
    }

    .custom-sidebar.close {
        width: 80px;
    }

    .custom-sidebar.close .text {
        opacity: 0;
    }

    .custom-sidebar li {
        height: 50px;
        margin-top: 10px;
        list-style: none;
        display: flex;
        align-items: center;
    }

    .custom-sidebar li .icon {
        min-width: 50px;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-sidebar li .icon,
    .custom-sidebar li .text {
        color: var(--text-color);
        transition: var(--tran-02);
    }


    .custom-sidebar header {
        position: relative;
    }

    .sidenav .image-text img {
        width: 40px;
        border-radius: 6px;

    }

    .custom-sidebar header .image-text {
        display: flex;
        align-items: center;
    }

    header .image-text .header-text {
        display: flex;
        flex-direction: column;

    }

    .header-text .name {
        font-weight: 600;

    }

    .header-text .profession {
        margin-top: -2px;
        white-space: nowrap;
    }


    .custom-sidebar header .toggle {
        position: absolute;
        top: 50%;
        right: -25px;
        transform: translateY(-50%) rotate(180deg);
        height: 25px;
        width: 25px;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: var(--sidebar-color);
        font-size: 16px;
        transition: var(--tran-03);
    }

    .custom-sidebar.close header .toggle {
        transform: translateY(-50%);
    }


    .custom-sidebar li a {
        text-decoration: none;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        border-radius: 6px;
        transition: var(--tran-04);
    }

    .custom-sidebar li a:hover {
        background: var(--primary-color);
    }

    .custom-sidebar li a:hover .icon,
    .custom-sidebar li a:hover .text {
        color: var(--sidebar-color);
    }

    .custom-sidebar .menu-bar {
        height: calc(100% - 80px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }



    .home {
        position: relative;
        height: 100vh;
        left: 250px;
        width: calc(100% - 250px);
        background: var(--body-color);
        transition: var(--tran-05);
    }

    .user-container {
        float: right;
        font-size: 14px;
        font-weight: 100;
        color: var(--text-color);
        margin-left: auto;
        /* Move to the end of the container */
    }

    .home .text {
        font-size: 26px;
        font-weight: 500;
        color: var(--text-color);
        padding: 8px 40px;
        background-color: #ffffff;
    }

    .custom-sidebar.close~.home {
        left: 81px;
        width: calc(100% - 81px);
    }

    .card-outline {
        border-top: 3px solid navy;
        border-radius: 5;
    }

    /* style for services page */

    /* title edit_status */
    .table-bordered .title {
        color: white;
        background-color: rgba(41, 100, 182, 0.981);
    }
</style>

<body>
    <nav class="custom-sidebar ">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('images/cliniclogo.png') }}" alt="">
                </span>

                <div class="text header-text">
                    <span class="name">Admin</span>
                    <span class="profession">Administrator</span>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="nav-link">
                    <a href="/list_appointments">
                        <i class="fa fa-calendar-day icon"></i>
                        <span class="text nav-text">Appointment Requests</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="/inquiries">
                        <i class="fa fa-circle-question icon"></i>
                        <span class="text nav-text">Inquiries</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="/inventory">
                        <i class="fa fa-boxes-stacked icon"></i>
                        <span class="text nav-text">Inventory</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="/generate-report">
                        <i class="fa fa-file-invoice icon"></i>
                        <span class="text nav-text">Report Generation</span>
                    </a>
                </li>
                <hr>
                <h4 class="text">Maintenance</h4>
                <li class="nav-link">
                    <a href="/category">
                        <i class="fa fa-table icon"></i>
                        <span class="text nav-text">Category</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="/services">
                        <i class="fa-solid fa-table-list icon"></i>
                        <span class="text nav-text">Services List</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="/users">
                        <i class="fa fa-users-gear icon"></i>
                        <span class="text nav-text">User List</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="fa-solid fa-gear icon"></i>
                        <span class="text nav-text">Settings</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>


    <section class="home">

        <div class="text">VetCare: Online Veterinary Appointment System
            <div class="dropdown float-end mx-auto">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-mdb-toggle="dropdown" aria-expanded="false">
                    @auth
                        {{ Auth::user()->firstname }}
                    @endauth
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">My Account</a></li>
                    <form id="logoutForm" method="post" action="{{ route('logout') }}">
                        @csrf
                        <li><a class="dropdown-item" href="#"
                                onclick="document.getElementById('logoutForm').submit();">
                                Logout<i class="fa-solid fa-right-from-bracket" style="float: right; margin-top: 5px;"></i>
                            </a></li>
                    </form>
                </ul>
            </div>
        </div>

        @yield('content')

    </section>

    <script>
        const
            body = document.querySelector("body"),
            sidebar = body.querySelector(".custom-sidebar"),
            toggle = body.querySelector(".toggle");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>
