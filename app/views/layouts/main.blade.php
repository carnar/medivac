<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="sitename" property="og:site_name" content="Mundialito 2014" />
    <meta property="og:url" content="{{URL::current()}}" />
    <meta property="og:title" content="Mundialito 2014" />
    <meta property="og:description" content="Mira mi pronósticos para la siguiente fase del Mundial Brasil 2014" />
    <meta property="og:image" content="{{ url('/') . '/ui/img/facebook-share.jpg' }}"/>
    <meta property="fb:app_id" content="{{Config::get('facebook')['appId']}}" />

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
    @include('share.header')
    <!-- main -->
    <div id="main" class="container">
        @yield('content')
    </div>
    @include('share.footer')
</body>
</html>