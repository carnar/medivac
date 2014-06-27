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

	public function edit()
	{
		if(Auth::guest() ||  !Auth::user()->is_admin) return Redirect::to('/');

		$matches = Match::all();
		$data = [];
		foreach ($matches as $match) {
			$newMatch = new stdClass();
			$newMatch->team_a = Team::find($match->team_a_id);
			$newMatch->team_b = Team::find($match->team_b_id);
			$newMatch->id = $match->id;
			$newMatch->score_a = $match->score_a;
			$newMatch->score_b = $match->score_b;
			//$newMatch->score_b = $match->score_b;
			$data[] = $newMatch;
		}

		return View::make('scores.form')->with('matches', $data);
	}

	public function update()
	{
		//validation
		$message = 'Se guardaron los resultados';

		$matches = Match::all();
		foreach ($matches as $match) {
			if(Input::get($match->team_a_id) != '')
			{
				$match->score_a = Input::get($match->team_a_id);
				$match->score_b = Input::get($match->team_b_id);
				$match->save();
			}
		}
			
		// assign points;
		$points = new Points(User::all(), Match::all());
		$points->assignment();

		return Redirect::to('scores/edit')->with('message', $message);
	}

}