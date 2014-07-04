<?php

class PredictionController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$currentTournament = (new TournamentRepository())->current();

		if(Auth::guest()  || Auth::user()->playing || $currentTournament->playing) return Redirect::to('/');

		$data = new stdClass();
		
		$user = new UserRepository();
		$data->user = $user->logged();
		$data->matches =  (new MatchRepository())->byTournamentId(
								(new TournamentRepository())->currentId()
																);

		return View::make('prediction.formnew')->with('data', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//validation
		$scoreValidator = (new ScoreValidator(
									Input::get(), 
									(new TournamentRepository())->currentId()
						  ))->make();

		if($scoreValidator->fails()) 
			return Redirect::back()->withErrors(['Debe ingresar todos los marcadores.']);

		//save predictions
		$predictions = new PredictionRepository();
		$predictions->save(Auth::user(), Input::get());

		//change playing status
		$user = new UserRepository();
		$user->startGame(Auth::user()->id);

		return Redirect::to('/prediction/' . Auth::user()->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try 
		{
			$currentTournament = (new TournamentRepository)->current();
			$matches = (new MatchRepository())->byTournamentId($currentTournament->id);

			$data = new stdClass();

			$user = new UserRepository();
			$data->user = $user->byId($id);

			$predictions = new PredictionRepository();
			$data->predictions = $predictions->get($data->user, (new TournamentRepository())->currentId());

			return View::make('prediction.shownew')->with('data', $data)->with('scores', $matches);
		} 
		catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
			App::abort(404); 
		}
	}
}
