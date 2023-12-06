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
        font-size: 16px;
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
        width: 300px;
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
        font-size: 25px;
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

    .user-container {
        float: right;
        font-size: 14px;
        font-weight: 100;
        color: var(--text-color);
        margin-left: auto;
    }


    @media (max-width: 768px) {
        h3 {
            margin-left: 80px;
            transition: margin-left var(--tran-05);
        }

        .card-header {
            padding-left: 80px;
            /* Adjust the padding as needed */
            transition: padding-left var(--tran-05);
        }

        .custom-sidebar.close h3,
        .custom-sidebar.close .card-header {
            margin-left: 0;
            padding-left: 0;
        }
    }

    .card-header {
        background: white;
        padding: 20px;
        border-bottom: 1px solid #ddd;
    }

    .card-outline {
        margin-left: 25px;
        margin-top: 20px;
        width: 115%;
        border-top: 3px solid navy;
        border-radius: 10px;
    }

    .table-bordered .title {
        color: white;
        background-color: rgba(41, 100, 182, 0.981);
    }

    .ellipsis {
        max-width: 150px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;


    }

    .custom-sidebar li.dropdown .fa-chevron-down {
        margin-left: 15px;
        color: black;
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
                    <a href="{{ route('admin.list_appointments') }}">
                        <i class="fa fa-calendar-day icon"></i>
                        <span class="text nav-text">Appointment Requests</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.inquiries') }}">
                        <i class="fa fa-circle-question icon"></i>
                        <span class="text nav-text">Inquiries</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.inventory') }}">
                        <i class="fa fa-boxes-stacked icon"></i>
                        <span class="text nav-text">Inventory</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.generate_report') }}">
                        <i class="fa fa-file-invoice icon"></i>
                        <span class="text nav-text">Report Generation</span>
                    </a>
                </li>
                <hr>
                <h4 class="text">Maintenance</h4>
                <li class="nav-link">
                    <a href="{{ route('admin.category') }}">
                        <i class="fa fa-table icon"></i>
                        <span class="text nav-text">Category</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.services') }}">
                        <i class="fa-solid fa-list icon"></i>
                        <span class="text nav-text">Services List</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.users') }}">
                        <i class="fa fa-users icon"></i>
                        <span class="text nav-text">User List</span>

                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.cases') }}">
                        <i class="fa fa-calendar-plus icon"></i>
                        <span class="text nav-text">Special Cases</span>

                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown" href="#" id="dropdownMenuLink" data-mdb-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-gear icon"></i>
                        <span class="text nav-text">Settings<i class="fa-solid fa-chevron-down"></i></span>

                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="{{ route('admin_side.content_management.services_list') }}">Services
                                Management</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('admin_side.content_management.footer_list') }}">Footer Management</a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>


    <section class="home">
        <div class="card-header">
            <h3>VetCare: Online Veterinary Appointment System
                <div class="dropdown float-end ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        @auth
                            {{ Auth::user()->firstname }}
                        @endauth
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        {{-- <li><a class="dropdown-item" href="#">My Account</a></li> --}}
                        <form id="logoutForm" method="post" action="{{ route('logout') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#"
                                    onclick="document.getElementById('logoutForm').submit();">
                                    Logout<i class="fa-solid fa-right-from-bracket" style="float: right;"></i>
                                </a></li>
                        </form>
                    </ul>
                </div>
                <div class="dropdown float-end mx-auto">
                    {{-- <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                        role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a> --}}
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                    </ul>
                </div>
            </h3>

        </div>

        @yield('content')
    </section>


    <script>
        const body = document.querySelector("body");
        const sidebar = body.querySelector(".custom-sidebar");
        const toggle = body.querySelector(".toggle");
        const cardHeader = document.querySelector(".card-header h3");

        function closeSidebarIfNecessary() {
            if (window.innerWidth <= 768) {
                sidebar.classList.add("close");
                cardHeader.style.marginLeft = "80px";
            } else {
                sidebar.classList.remove("close");
                cardHeader.style.marginLeft = "300px";
            }
        }


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if (sidebar.classList.contains("close")) {
                cardHeader.style.marginLeft = "80px";
            } else {
                cardHeader.style.marginLeft = "300px";
            }
        });
        window.addEventListener("resize", closeSidebarIfNecessary);

        closeSidebarIfNecessary();
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>
