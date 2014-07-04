<?php 
/**
* Leaderboard manager
*/
class Leaderboard {
	protected $tournamentId;

	public function __construct($tournamentId)
	{
		$this->tournamentId = $tournamentId;
	}

	public function make()
	{
		$this->update($this->positions($this->tournamentId), $this->tournamentId);
		$this->assignPlaces(
				Position::where('tournament_id', '=', $this->tournamentId)->get(),
				$this->tournamentId
		);
	}

	public function assignPlaces($players, $tournamentId)
	{
		$places = $this->getPlacesByPoints($tournamentId);
		$maxPoints = $places[0]->points;
		// dd($places[0]->points);
		foreach ($players as $player) 
		{
			foreach ($places as $key => $value) 
			{
				if($player->points == $value->points)
				{
					$player->position = $key + 1;
					$player->percentage = ($player->points * 50 / $maxPoints) + 50;
					$player->save();
					break;
				} 
			}

		}
	}

	public function getPlacesByPoints($tournamentId)
	{
		return DB::select(
				DB::raw("SELECT DISTINCT points FROM positions WHERE tournament_id = :tournament_id ORDER BY(points) DESC"),
				['tournament_id' => $tournamentId]
		);
	}

	private function positions($tournamentId)
	{
		return DB::select(
				DB::raw('SELECT u.id as user_id, p.tournament_id as tournament_id, u.name, u.photo, sum(p.points) AS points FROM predictions p, users u WHERE u.id = p.user_id AND tournament_id = :tournament_id GROUP BY u.id ORDER BY points DESC'),
				['tournament_id' => $tournamentId]
				);
	}

	private function update($positions, $tournamentId)
	{
		$this->delete($tournamentId);
		foreach ($positions as $position) {
			Position::create((array)$position);
		}
	}

	private function delete($tournamentId)
	{
		return DB::delete(
				DB::raw("DELETE FROM positions WHERE tournament_id = :tournament_id"), 
				['tournament_id' => $tournamentId]);
	}
}