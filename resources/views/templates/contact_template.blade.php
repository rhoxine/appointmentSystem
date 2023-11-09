<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <title>Contact</title>
</head>
<style>
    body{
        padding: 0;
        margin: 0;
    }
    .container-contact{
        background: linear-gradient(135deg, #8BC6EC, #9599E2);
        width: 100%;
        height: 100%;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .header{
        font-size: 3.4vw;
        padding: 20px;
        margin-bottom: 33px;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 700;
    }

    .row{
        border: 1px solid yellow;
        width: 60%;
        background: #fff;
        border-radius: 20px;
    }
    .row .col{
        padding: 50px;
    }
</style>

<body>

    @yield('content')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>
