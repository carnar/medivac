<?php 

/**
* Scores validation
*/
class ScoreValidator 
{
	protected $validator;
	protected $rules = 	[];

	public function __construct($data, $tournamentId = 1)
	{
		// set rules
		$matches = (new MatchRepository())->byTournamentId($tournamentId);
		foreach ($matches as $match) {
			$this->rules[$match->team_a->id] = 'required|numeric|max:10';
			$this->rules[$match->team_b->id] = 'required|numeric|max:10';
		}

		$this->validator = Validator::make($data, $this->rules);
	}

	public function make()
	{
		return $this->validator;
	}

}