    <!-- header -->
    <div id="header" class="container">
        <div class="row">
            <h1 id="logo"><a title="Mundialito 2014" href="/">Mundialito 2014</a></h1>
            <ul id="main_menu">
            	@if(Auth::check() && isset(Auth::user()->id) && Auth::user()->playing)
                <li><a href="/prediction/{{Auth::user()->id}}">Mis predicciones</a></li>
                @endif
                <li><a href="/leaderboard">Posiciones</a></li>
                <li><a href="/rules">Reglas</a></li>
            </ul>
        </div>
        @include('share.scores')
      </div>