<?php 

class Points
{
	protected $users;
	protected $matches;
	protected $matchesComparison;
	protected $leaderboard;
	protected $tournamentId;
	private $rules = ['guess_result' => 3, 'guess_score' => 1];

	public function __construct($users, $matches, $tournamentId)
	{
		$this->users = $users;
		$this->matches = $matches;
		$this->tournamentId = $tournamentId;
		$this->matchesComparison = new MatchesComparison();
		$this->leaderboard = new Leaderboard($tournamentId);
	}

	public function assignment()
	{
		foreach ($this->users as $user) {
			$this->assignToUser($user, $this->matches, $this->tournamentId);
		}
		$this->leaderboard->make();
	}

	/**
	 * Assign point to every user match
	 * @param  Model 		$user    User's data
	 * @param  Collection 	$matches Real matches score
	 */
	public function assignToUser($user, $matches, $tournamentId)
	{
		foreach ($user->predictions()->where('tournament_id', '=', $tournamentId)->get() as $prediction)
		{
			$points = 0;
			$match = $matches->find($prediction->match_id);
			if($match->score_a != '')
			{
				$points = $this->calculate($prediction, $match);
				$prediction->points = $points;
				$prediction->save();
			}
		}
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