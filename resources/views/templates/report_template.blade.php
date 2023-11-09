<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Date Picker Example</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <input type="text" id="datepicker">

    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker();
        });
    </script>
</body>

</html>
