<?php 
/**
* Matches result comparation
*/
class MatchesComparison {
	
	public function guessResult($prediction, $match)
	{
		if($match->score_a > $match->score_b)
			return $this->wonTeamA($prediction);
		else if($match->score_a == $match->score_b)
			return $this->draw($prediction);
		else
			return $this->wonTeamB($prediction);
	}

	public function wonTeamA($game)
	{
		return $game->score_a > $game->score_b;
	}

	public function wonTeamB($game)
	{
		return $game->score_a < $game->score_b;
	}

	public function draw($game)
	{
		return $game->score_a == $game->score_b;
	}

	public function guessScoreA($prediction, $match)
	{
		return $prediction->score_a == $match->score_a;
	}	

	public function guessScoreB($prediction, $match)
	{
		return $prediction->score_b == $match->score_b;
	}
}