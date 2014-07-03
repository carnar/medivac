<?php 
class TournamentRepository
{
	protected $model;
	protected $configuration;

	public function __construct()
	{
		$this->model = new Tournament();
		$this->configuration = new Configuration();
	}

	public function currentId()
	{
		return $this->configuration->where('name', '=' , 'current_tournament_id')
												->first()->value;
	}

	public function current()
	{
		return $this->model->find($this->currentId());
	}
}