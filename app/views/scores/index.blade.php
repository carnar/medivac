<div id="matches">	
	@foreach($matches as $match)
	<div class="match">
		<div class="team-a">
			<div class="flag">
				
			</div>
			<div class="name">
				{{ $match->team_a->name }}
			</div>
			<div class="score">
				{{ $match->score_a }}
			</div>
		</div>
		<div class="team-b">
			<div class="flag">
				
			</div>
			<div class="name">
				{{ $match->team_b->name }}
			</div>
			<div class="score">
				{{ $match->score_b }}
			</div>
		</div>
	</div>
	@endforeach
</div>