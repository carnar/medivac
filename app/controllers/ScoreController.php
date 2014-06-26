<?php 

class ScoreController extends BaseController {

	public function index()
	{
		$matches = Match::all();
		$realMatches = [];
		foreach ($matches as $match) {
			$teamA = Team::findOrFail($match->team_a_id);
			$teamB = Team::findOrFail($match->team_b_id);
			
			$realMatch = new stdClass();
			$realMatch->team_a = $teamA;
			$realMatch->team_b = $teamB;
			$realMatch->score_a = ($match->score_a)?: '-';
			$realMatch->score_b = ($match->score_b)?: '-';

			$realMatches[] = $realMatch;
		}
		return View::make('scores.index')->with('matches', $realMatches);
	}

	public function update()
	{
		//update
	}

	public function store()
	{
		# code...
	}

}