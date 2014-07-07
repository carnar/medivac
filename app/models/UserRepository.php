<?php 
class UserRepository
{
	protected $logged;
	protected $model;

	public function __construct()
	{
		$this->logged = Auth::user();
		$this->model = new User();
		$this->tournament = new TournamentRepository();
		$this->prediction = new PredictionRepository();
	}

	public function positionByTournamentId($user, $tournamentId)
	{
		$positionTournament = '';
		$positions = $user->positions();
		if(isset($positions->where('tournament_id', '=', $tournamentId)->first()->position))
			$positionTournament = $positions->where('tournament_id', '=', $tournamentId)->first()->position;
		return (!empty($positionTournament)) ? $positionTournament : '' ;
	}

	public function logged()
	{
		$user = new stdClass();
		$user->id = $this->logged->id;
		$user->name = $this->logged->name;
		$user->photo = $this->logged->photo;
		$user->position = $this->positionByTournamentId($this->logged, $this->tournament->currentId());
		return $user;
	}

	public function byId($id)
	{
		$user = $this->model->findOrFail($id);
		$userMapped = new stdClass();
		$userMapped->id = $user->id;
		$userMapped->name = $user->name;
		$userMapped->photo = $user->photo;
		$userMapped->position = $this->positionByTournamentId($user, $this->tournament->currentId());
		$userMapped->predictions = $user->predictions();
		return $userMapped;
	}

	public function startGame($userId)
	{
		$user = User::findOrFail($userId);
		$user->playing = 1;
		$user->save();
	}

	public function playingByTournamentId($tournamentId)
	{
		$users = $this->model->where('playing', '=', 1)->orderBy('name')->get();
		$playingUsers = [];
		foreach ($users as $user) {
			$predictions = $this->prediction->byUserIdAndTournamentId($user->id, $tournamentId)->get();
			if(!$predictions->isEmpty())
			{
				$playingUsers[] = $user;
			}
		}
		return $playingUsers;
	}
}