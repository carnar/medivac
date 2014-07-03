<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="sitename" property="og:site_name" content="Mundialito 2014" />
    <meta property="og:url" content="{{URL::current()}}" />
    <meta property="og:title" content="Mundialito 2014" />
    <meta property="og:description" content="Atrévete a pronosticar los resultados del Mundial 2014" />
    <meta property="og:image" content="{{ url('/') . '/ui/img/prediction.png' }}"/>
    <meta property="fb:app_id" content="{{Config::get('facebook')['appId']}}" />

    <title>Mundialito 2014</title>
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/ui/css/styles.css" />
    <script src="/ui/js/jquery.js"></script>
    <script src="/ui/js/functions.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-2582665-5', 'auto');
      ga('send', 'pageview');

    </script>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">    
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