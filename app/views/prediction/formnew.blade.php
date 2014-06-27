@extends('layouts.main')
@section('content')
        <div class="row">
            <div id="prediction_table">
                {{ Form::open(array('url' => '/prediction')) }}
                @foreach($data->matches as $match)
                    <div class="match">
                        <div class="team-a">
                            <label class="name {{ strtolower($match->team_a->country_code) }}" for="{{Str::slug($match->team_a->name)}}">{{ $match->team_a->name }}</label>
                            <input class="score" name="{{$match->team_a->id}}" type="text" />
                        </div>
                        <div class="team-b">
                            <label class="name {{ strtolower($match->team_b->country_code) }}" for="{{Str::slug($match->team_b->name)}}">{{ $match->team_b->name }}</label>
                            <input class="score" name="{{$match->team_b->id}}" type="text" />
                        </div>
                    </div>
                @endforeach
                    <button type="button">Jugar!</button>
                    <!-- modal -->
                    <div id="modal" class="notification">
                        <div id="modal_box">
                            <p>¿Estas seguro que vas a jugar con estas predicciones? Una vez aceptes no habrá marcha atrás.</p>
                            <button class="red" type="button">Regresar</button>
                            <button class="green" type="submit">Si, estoy seguro!</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
@stop