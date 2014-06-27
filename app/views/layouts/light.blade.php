<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mundialito 2014</title>
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/ui/css/styles.css" />
    <script src="/ui/js/jquery.js"></script>
    <script src="/ui/js/functions.js"></script>
</head>
<body>
    @if($errors->any())
    <!-- notification -->
    <div id="notification_box" class="error">
        <div class="row">
            <ul>
                <li>{{ $errors->first() }}</li>
            </ul>
        </div>
    </div>
    @endif
    @include('share.headerlight')
    <!-- main -->
    <div id="main" class="container">
        @yield('content')
    </div>
    @include('share.footer')
</body>
</html>