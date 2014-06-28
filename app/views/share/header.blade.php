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
                <div id="user_photo"><img src="{{ $data->user_photo . "?type=normal" }}" alt="user_name"></div>
                <!-- <div id="user_photo"><img src="https://scontent-b.xx.fbcdn.net/hprofile-xpf1/t1.0-1/p100x100/10426622_10152456087315688_5744425132878037852_a.jpg" alt="user_name"></div> -->
                <div id="user_name">{{ $data->user_name }}</div>
                <!-- <a href="#leaderboard_with_hashtag" id="user_position">Puesto #3</a> -->
            </div>
        </div>
    </div>