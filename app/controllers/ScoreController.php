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

		$data = (new MatchRepository())->byTournamentId(
								(new TournamentRepository())->currentId()
																);
		return View::make('scores.form')->with('matches', $data);
	}

	public function update()
	{
		//validation
		$message = 'Se guardaron los resultados';
		
		$tournamentId = (new TournamentRepository())->currentId();
		$matchRepo = new MatchRepository();
		$userRepo = new UserRepository();

		$matches = $matchRepo->byTournamentId($tournamentId);
		$matchRepo->saveScores($matches, Input::get());

		// dd('Se grabaron los marcadores');	
		// assign points;
		$points = new Points(
							$userRepo->playingByTournamentId($tournamentId), 
							$matchRepo->allByTournamentId($tournamentId),
							$tournamentId
							);
		$points->assignment();

		return Redirect::to('scores/edit')->with('message', $message);
	}

}