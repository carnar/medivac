<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mundialito 2014</title>
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="ui/css/styles.css" />
</head>
<body>
    <!-- notification -->
    <div id="notification_box" class="succes || error">
        <div class="row">
            <ul>
                <li>Solo se aceptan números</li>
                <li>Llene todas las casillas</li>
            </ul>
        </div>
    </div>
    @include('share.header')
    <!-- main -->
    <div id="main" class="container">
        @yield('content')
    </div>
    @include('share.footer')
</body>
</html>