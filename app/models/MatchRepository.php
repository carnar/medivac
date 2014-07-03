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
			$matchDetail->id = $match->id;
			$matchDetail->tournament_id = $tournamentId;
			$matchesDetail[] = $matchDetail;
		}
		return $matchesDetail;
	}
}