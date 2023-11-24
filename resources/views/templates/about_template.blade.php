<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
</head>
<style>
    body{
        padding: 0;
        margin: 0;
        /* overflow: hidden; */
    }

    .about-container{
        background: linear-gradient(135deg, #8BC6EC, #9599E2);
        width: 100%;
        height: 100%;
        padding: 30px;
    }

    .about-content{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 32px;
    }

    .about-content .text-about{
        font-family:Georgia, 'Times New Roman', Times, serif ;
        font-size: 25px;
        text-align: justify;
        padding: 30px;
        width: 100%;
    }

    .title-about{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 30px;
        gap: 20px;
    }

    .title-about img{
        width: 100px;
        height: 100px;
    }

    .title-about p{
        font-weight: 700;
        font-size: 40px;
    }

    .staff-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 35px;
    }
    .header{
        font-size: 40px;
        font-weight: bold;
        padding: 40px;
    }
    .row{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        gap: 30px;
        padding: 30px;
    }

    .card{
        width: 350px;
    }

    .card-body{
        text-align: center;
        vertical-align: middle;
    }

    .card-body .card-text{
        font-style:oblique;
    }
</style>

<body>
    @yield('content')

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>
