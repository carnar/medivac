@extends('layouts.light')
@section('content')
        <div class="row">
           <h1>Posiciones</h1>
           <p> Descubre cual es tu posición. </p>
           <hr />
           <ul id="positions_table">
           @foreach($data as $player)
               <li id="{{ $player->user_id }}" style="width: {{ $player->percentage }}%;" >
                   <a class="user_trail" href="/prediction/{{ $player->user_id }}">
                        <div class="user_data">
                            <p class="user_name">{{ $player->name }}</p>
                            <p class="user_points">{{ $player->points }}pts</p>
                        </div>
                        <p class="user_position">#{{ $player->position }}</p>
                        <div class="user_photo"><img src="{{ $player->photo }}"></div>
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