<div id="user-info">
	<div class="photo">
		<img src="{{ $data->user_photo }}">
	</div>
	<div class="name">
		<span class="full-name">{{ $data->user_name }}</span>
	</div>
</div>

<div id="prediction-form">
{{ Form::open(array('url' => '/prediction')) }}
@foreach($data->matches as $match)
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
{{ Form::close() }}
</div>