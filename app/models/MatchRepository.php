<?php 
/**
* Match
*/
class MatchRepository
{
	protected $model;

	function __construct()
	{
		$this->model = new Match();
	}

	public function byTournamentId($tournamentId)
	{
		$matches = $this->model->where('tournament_id', '=' , $tournamentId)->get();
		$matchesDetail = [];
		foreach ($matches as $match) {
			$matchDetail = new stdClass();
			$matchDetail->team_a = Team::find($match->team_a_id);
			$matchDetail->team_b = Team::find($match->team_b_id);
			$matchDetail->score_a = $match->score_a;
			$matchDetail->score_b = $match->score_b;
			$matchDetail->id = $match->id;
			$matchDetail->tournament_id = $tournamentId;
			$matchesDetail[] = $matchDetail;
		}
		return $matchesDetail;
	}

	public function allByTournamentId($tournamentId)
	{
		 return $this->model->where('tournament_id', '=', $tournamentId)->get();
	}

	public function saveScores($matches, $scores)
	{
		foreach ($matches as $match) {
			if($scores[$match->team_a->id] != '')
			{
				$source = $this->model->find($match->id);
				$source->score_a = $scores[$match->team_a->id];
				$source->score_b = $scores[$match->team_b->id];
				$source->save();
			}
		}
	}
}