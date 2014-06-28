<?php 

class Points
{
	protected $users;
	protected $matches;
	protected $matchesComparison;
	protected $leaderboard;
	private $rules = ['guess_result' => 3, 'guess_score' => 1];

	public function __construct($users, $matches)
	{
		$this->users = $users;
		$this->matches = $matches;
		$this->matchesComparison = new MatchesComparison();
		$this->leaderboard = new Leaderboard();
	}

	public function assignment()
	{
		foreach ($this->users as $user) {
			$this->assignToUser($user, $this->matches);
		}
		$this->leaderboard->make();
	}

	public function createLeaderboard($user)
	{
		// $total = Prediction::groupBy($user->id)->get('')first();
	}

	/**
	 * Assign point to every user match
	 * @param  Model 		$user    User's data
	 * @param  Collection 	$matches Real matches score
	 */
	public function assignToUser($user, $matches)
	{
		// dd($user->predictions()->get());
		foreach ($user->predictions()->get() as $prediction)
		{
			$points = 0;
			$match = $matches->find($prediction->match_id);
			//echo "<p>----$match->score_a****</p>";
			if($match->score_a != '')
			{
				$points = $this->calculate($prediction, $match);
				$prediction->points = $points;
				$prediction->save();
			}
		}
		// dd('fin');
	}

	public function calculate($prediction, $match)
	{
		$points = 0;
		if($this->matchesComparison->guessResult($prediction, $match)) 
			$points += $this->rules['guess_result'];

		if($this->matchesComparison->guessScoreA($prediction, $match)) 
			$points += $this->rules['guess_score'];

		if($this->matchesComparison->guessScoreB($prediction, $match)) 
			$points += $this->rules['guess_score'];

		return $points;
	}


}