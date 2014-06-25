{{ Form::open(array('url' => '/prediction')) }}
<div id="prediction-form">
@foreach($matches as $match)
<div class="match">
	<div class="team-a">
		<div class="name">
			{{ Form::label(Str::slug($match->team_a->name), $match->team_a->name) }}
		</div>
		<div class="score">
			{{ Form::text($match->team_a->id) }}
		</div>
	</div>
	<div class="team-b">
		<div class="name">
			{{ Form::label(Str::slug($match->team_b->name), $match->team_b->name) }}
		</div>
		<div class="score">
			{{ Form::text($match->team_b->id) }}
		</div>
	</div>	
</div>
@endforeach
	{{ Form::submit('Jugar!') }}
</div>
{{ Form::close() }}