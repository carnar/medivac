<?php 

class LeaderboardController extends BaseController {

	public function index()
	{
		$currentTournament = (new TournamentRepository)->current();
		if($currentTournament->playing)
		{
			echo "se está jugando - mostrar leaderboard";
		}
		else
		{
			$users = new UserRepository();
			$data = $users->playingByTournamentId($currentTournament->id);
			return View::make('leaderboard.players')->with('data', $data);
		}
	}
}