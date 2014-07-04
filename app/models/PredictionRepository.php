<?php 
class PredictionRepository
{
	protected $model;
	protected $matches;

	public function __construct()
	{
		$this->model = new Prediction();
		$this->matches = (new MatchRepository())->byTournamentId((new TournamentRepository())->currentId());
	}

	public function save($user, $predictions)
	{
		foreach ($this->matches as $match) {
			$prediction = [];
			$prediction['user_id'] = $user->id;
			$prediction['tournament_id'] = $match->tournament_id;
			$prediction['match_id'] = $match->id;
			$prediction['score_a'] = $predictions[$match->team_a->id];
			$prediction['score_b'] = $predictions[$match->team_b->id];
			// dd($prediction);
			$result = Prediction::create($prediction);
		}
	}

	public function get($user, $tournamentId)
	{
		$predictions = $user->predictions->where('tournament_id', '=', $tournamentId)->get();
		$predictionsDetails = [];
		
		foreach ($predictions as $prediction) 
		{
			$match = Match::find($prediction->match_id);
			$teamA = Team::find($match->team_a_id);
			$teamB = Team::find($match->team_b_id);
			
			$predictionDetail = new stdClass();
			$predictionDetail->team_a = $teamA;
			$predictionDetail->score_a = $prediction->score_a;
			$predictionDetail->team_b = $teamB;
			$predictionDetail->score_b = $prediction->score_b;
			$predictionsDetails[] = $predictionDetail;
		}
		return $predictionsDetails;
	}

	public function byUserIdAndTournamentId($userId, $tournamentId)
	{
		return $this->model->where('user_id', '=', $userId)
						   	->where('tournament_id', '=', $tournamentId);
	}

}