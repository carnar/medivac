@if(!empty(Session::get('message')))
<div class="message">{{ Session::get('message') }}</div>
@endif
{{ Form::open(array('url' => '/scores')) }}
<div id="scores-form">
@foreach($matches as $match)
<div class="match">
	<div class="team-a">
		<div class="name">
			{{ Form::label(Str::slug($match->team_a->name), $match->team_a->name) }}
		</div>
		<div class="score">
			{{ Form::text($match->team_a->id, $match->score_a) }}
		</div>
	</div>
	<div class="team-b">
		<div class="name">
			{{ Form::label(Str::slug($match->team_b->name), $match->team_b->name) }}
		</div>
		<div class="score">
			{{ Form::text($match->team_b->id, $match->score_b) }}
		</div>
	</div>	
</div>
@endforeach
	{{ Form::submit('Grabar') }}
</div>
{{ Form::close() }}