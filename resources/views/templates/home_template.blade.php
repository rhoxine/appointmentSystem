<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <title>Homepage</title>
</head>
<style>
    body{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        outline: none; border: none;
    }
    .image-container {
        background-image:linear-gradient(to right, rgb(0 0 0 / 0.5), rgb(0 0 0 / 0)), url("images/background.jpg");
        background-repeat: no-repeat;
        height: auto;
        width: 100%;
        background-size: cover;
    }

    .tagline{
        vertical-align: middle;
        text-align: left;
        padding: 17% 0 10% 7%;
        color: #fff;
        font-family:Georgia, 'Times New Roman', Times, serif;
    }
    .tag1{
        font-size: 4vw;
        font-weight: bold;
    }
    .tag2{
        font-size: 3vw;
    }

    .bhours {
        margin-bottom: -7px;
    }

    .service-container{
        padding: 15px 9%;
        padding-bottom: 50px;
    }

    .services{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .card{
        text-align: center;
        vertical-align: middle;
        padding: 30px 20px;
        transition: .2s linear;
        border-radius: 59px;
        background: #e0e0e0;
        box-shadow:  -18px -18px 43px #c7c7c7,
                    18px 18px 43px #f9f9f9;
    }

    .card:hover{
        transform: scale(1.03);
    }

    .card img{
        height: 200px;
        margin-bottom: 25px;
    }

    .card h5{
        font-size: 25px;
        font-weight: bold;
    }
    .heading{
        text-align: center;
        padding: 20px;
        font-weight: bold;
        color:#434242;
        text-shadow: 0 5px 10px rgba(0,0,0,.2);
        font-size: 70px;
    }
    footer {
        background-color: #C2D9FF;
        padding: 20px 0;
    }

    .container {
        max-width: 100%;
        margin: 0 auto;
    }

    .row {
        display: flex;
        justify-content: space-evenly;
        text-align: justify;
        text-align: center;
        flex-wrap: wrap;
    }

    .text-uppercase{
        font-weight: bold;
    }

    @media (max-width: 767px) {
        .col-lg-4, .col-md-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
    @media (max-width: 768px) {
        .service-container{
            padding: 20px;
        }
    }
</style>

<body>

    @yield('content')

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>
