<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Contact</title>
</head>
<style>
    body {
        padding: 0;
        margin: 0;
    }

    .container-contact {
        background: linear-gradient(135deg, #8BC6EC, #9599E2);
        min-height: 100vh;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .header {
        font-size: 3.4vw;
        margin-bottom: 33px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana,
            sans-serif;
        font-weight: 700;
    }

    .row {
        width: 100%;
        max-width: 800px;
        background: #fff;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row .col {
        padding: 20px;
        text-align: center;
    }

    .row img {
        max-width: 100%;
        margin-bottom: 20px;
    }

    @media (min-width: 768px) {
        .row {
            width: 60%;
            flex-direction: row;
            align-items: initial;
        }

        .row .col {
            text-align: initial;
        }
    }
</style>

<body>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').submit(function(event) {
                    event.preventDefault(); 

                    @auth
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        success: function(response) {
                         
                            console.log(response);
                           
                            $('#contactForm')[0].reset();
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                @else
                    Swal.fire({
                        icon: 'warning',
                        text: 'Please log in to send a message.',
                    });
                @endauth
            });
        });
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>


</html>
