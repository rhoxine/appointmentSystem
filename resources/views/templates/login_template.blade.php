<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <title>Login</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bruno+Ace&family=Cormorant+Garamond:ital,wght@0,300;1,300&family=Dancing+Script&family=EB+Garamond:ital@1&family=PT+Sans+Caption:wght@400;700&family=Poppins&family=Quicksand:wght@300&family=Rubik:ital,wght@0,300;1,300&family=Sevillana&display=swap');

    body {
        padding: 0;
        margin: 0;
        background-image: url('/images/background.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        opacity: 0.8;
    }
    .container{
        width: 500px;
        height: auto;
        padding: 20px;
        background: #fff;
        border-radius: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .img-container{
        display: flex;
        justify-content: center;
    }
    button{
        width: 150px;
        margin: 20px;
    }
    .error-message{
        font-size: 12px;
        margin-top: -16px;
        margin-left: 3px;
        color: rgb(208, 16, 16);
        float: left;
    }
</style>

<body>
    @yield('content')
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>
