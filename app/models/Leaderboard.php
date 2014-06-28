<?php 
/**
* Leaderboard manager
*/
class Leaderboard {
	
	public function make()
	{
		$this->update($this->positions());
	}

	private function positions()
	{
		return DB::select(DB::raw('SELECT u.id as user_id, u.name, sum(p.points) AS points FROM predictions p, users u WHERE u.id = p.user_id GROUP BY u.id ORDER BY u.name ASC'));
	}

	private function update($positions)
	{
		// $this->delete();
		dd($positions);
	}

	private function delete()
	{
		return DB::raw('DELETE * FROM positions');
	}
}