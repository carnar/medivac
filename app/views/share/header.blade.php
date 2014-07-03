    <!-- header -->
    <div id="header" class="container">
        <div class="row">
            <h1 id="logo"><a href="#leaderboard">Mundialito 2014</a></h1>
            <ul id="main_menu">
                @if(Auth::check() && isset(Auth::user()->id) && Auth::user()->playing)
                <li><a href="/prediction/{{Auth::user()->id}}">Mis predicciones</a></li>
                @endif
                <li><a href="/leaderboard">Posiciones</a></li>
                <li><a href="/rules">Reglas</a></li>
            </ul>
        </div>
        <div class="row">
            <div id="user_data" class="first">
                <div id="user_photo"><img src="{{ $data->user->photo . "?type=normal" }}" alt="user_name"></div>
                <div id="user_name">{{ $data->user->name }}</div>
                @if(!empty($data->user->position ))
                <a href="/leaderboard#{{ $data->user->id }}" id="user_position">Puesto #{{ $data->user->position }}</a>
                @endif
            </div>
        </div>
    </div>