@extends('layouts.light')
@section('content')
        <div class="row">
            <p>&nbsp</p>
            <p>Pronostica los resultados de los partidos de la próxima ronda del Mundial Brasil 2014 y podrás derrotar a tus amigos y demás participantes en este emocionante juego.</p>
            <p>&nbsp</p>
            <div style="text-align:center">
            <iframe width="350" height="240" src="//w2.countingdownto.com/581746" frameborder="0"></iframe>
            <p>&nbsp</p>
            <p>&nbsp</p>
                    @if(Auth::guest())
                    <a href="/login/fb"><button id="login_button" class="button fb_blue"><span>Participa tú también!</span></button></a>
                    @else
                    <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{URL::current()}}"><button id="login_button" class="button fb_blue"><span>Comparte en facebook</span></button></a>
                    @endif            
            <p>&nbsp</p>
			</div>
        </div>
@stop