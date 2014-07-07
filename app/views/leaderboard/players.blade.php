@extends('layouts.light')
@section('content')
        <div class="row">
          @if(!$playing)
            <div style="text-align:center">
                <iframe width="350" height="240" src="//w2.countingdownto.com/589766" frameborder="0"></iframe>
                <p>&nbsp</p>
            </div>
          @endif
           <h1>Jugadores inscritos</h1>
           <p>Descubre quién ganará.</p>
           <hr />
            <div id="search_input_container">
               <label for="search_input">Encuéntrate</label>
               <input type="text" id="search_input" placeholder="Nombre, #posición" />
           </div>
           <ul id="positions_table">
           @foreach($data as $player)
               <li id="{{ $player->user_id }}" style="width: 100%;" >
                   <a class="user_trail" href="/prediction/{{ $player->id }}">
                        <div class="user_data">
                            <p class="user_name">{{ $player->name }}</p>
                        </div>
                        <div class="user_photo"><img src="{{ $player->photo }}?type=small"></div>
                    </a>
               </li>
            @endforeach
            </ul>
            <div style="text-align:center">
            <p>&nbsp</p>
                <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{URL::current()}}"><button id="login_button" class="button fb_blue"><span>Comparte en facebook</span></button></a>
            </div>
        </div>
@stop