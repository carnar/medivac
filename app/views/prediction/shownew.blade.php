@extends('layouts.main')
@section('content')
        <div class="row">
            <div id="prediction_table">
                {{ Form::open(array('url' => '/prediction')) }}
                @foreach($data->user_predictions as $prediction)
                    <div class="match">
                        <div class="team-a">
                            <label class="name {{ strtolower($prediction->team_a->country_code) }}" for="{{Str::slug($prediction->team_a->name)}}">{{ $prediction->team_a->name }}</label>
                            <!-- <input class="score" name="{{$prediction->team_a->id}}" type="text" /> -->
                        </div>
                        <div class="prediction">
                          {{ $prediction->score_a }}  - {{ $prediction->score_b }}
                        </div>
                        <div class="team-b">
                            <label class="name {{ strtolower($prediction->team_b->country_code) }}" for="{{Str::slug($prediction->team_b->name)}}">{{ $prediction->team_b->name }}</label>
                            <!-- <input class="score" name="{{$prediction->team_b->id}}" type="text" /> -->
                        </div>
                    </div>
                @endforeach
                    <p>&nbsp</p>
                    <!-- <a href="http://www.facebook.com/sharer/sharer.php?u=#url"><button id="play_button" class="button yellow" type="button">Comparte en facebook!</button></a> -->
                    @if(Auth::guest())
                    <a href="/login/fb"><button id="login_button" class="button fb_blue"><span>Participa tú también!</span></button></a>
                    @else
                    <a href="http://www.facebook.com/sharer/sharer.php?u=#url"><button id="login_button" class="button fb_blue"><span>Comparte en facebook</span></button></a>
                    @endif

                    <!-- modal -->
                    <div id="modal" class="notification">
                        <div id="modal_box">
                            <p>¿Estas seguro que vas a jugar con estas predicciones? Una vez aceptes no habrá marcha atrás.</p>
                            <button id="cancel_button" class="button red" type="button">Regresar</button>
                            <button class="button green" type="submit">Si, estoy seguro!</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
@stop