<?php 
/**
* Leaderboard manager
*/
class Leaderboard {
	
	public function make()
	{
		$this->update($this->positions());
		$this->assignPlaces(Position::all());
	}

	public function assignPlaces($players)
	{
		$places = $this->getPlacesByPoints();
		$maxPoints = $places[0]->points;
		// dd($places[0]->points);
		foreach ($players as $player) 
		{
			foreach ($places as $key => $value) 
			{
				if($player->points == $value->points)
				{
					$player->position = $key + 1;
					$player->percentage = $player->points * 100 / $maxPoints;
					$player->save();
					break;
				} 
			}

		}
	}

	public function getPlacesByPoints()
	{
		return DB::select(DB::raw("SELECT DISTINCT points FROM positions ORDER BY(points) DESC"));
	}

	private function positions()
	{
		return DB::select(DB::raw('SELECT u.id as user_id, u.name, u.photo, sum(p.points) AS points FROM predictions p, users u WHERE u.id = p.user_id GROUP BY u.id ORDER BY u.name ASC'));
	}

	private function update($positions)
	{
		$this->delete();
		foreach ($positions as $position) {
			Position::create((array)$position);
		}
	}

	private function delete()
	{
		return DB::delete(DB::raw('DELETE FROM positions'));
	}
}