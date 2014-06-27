
<div id="user-info">
	<div class="photo">
		<img src="{{ $data->user_photo }}">
	</div>
	<div class="name">
		<span class="full-name">{{ $data->user_name }}</span>
	</div>
	<div class="place">#3</div>
	<div class="points">7 pts.</div>
</div>
<div id="predictions">	
	@foreach($data->user_predictions as $prediction)
	<div class="match">
		<div class="team-a">
			<div class="flag">
				
			</div>
			<div class="name">
				{{ $prediction->team_a->name }}
			</div>
			<div class="score">
				{{ $prediction->score_a }}
			</div>
		</div>
		<div class="team-b">
			<div class="flag">
				
			</div>
			<div class="name">
				{{ $prediction->team_b->name }}
			</div>
			<div class="score">
				{{ $prediction->score_b }}
			</div>
		</div>
	</div>
	@endforeach
</div>