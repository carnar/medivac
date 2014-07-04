<?php 

class LeaderboardController extends BaseController {

	public function index()
	{
		$currentTournament = (new TournamentRepository)->current();
		$matches = (new MatchRepository())->byTournamentId($currentTournament->id);

		$data = Position::where('tournament_id', '=', $currentTournament->id)->get();
		if($currentTournament->playing && !$data->isEmpty())
		{
			return View::make('leaderboard.index')->with('data', $data)->with('scores', $matches);
		}
		else
		{
			$users = new UserRepository();
			$data = $users->playingByTournamentId($currentTournament->id);
			return View::make('leaderboard.players')->with('data', $data)
													->with('scores', $matches)
													->with('playing', $currentTournament->playing);
		}
	}
}