<?php

class PredictionController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		if(Auth::guest()  || Auth::user()->playing) return Redirect::to('/');

		$matches = Match::all();
		$data = [];
		foreach ($matches as $match) {
			$newMatch = new stdClass();
			$newMatch->team_a = Team::find($match->team_a_id);
			$newMatch->team_b = Team::find($match->team_b_id);
			$newMatch->id = $match->id;
			$data[] = $newMatch;
		}
		// exit;
		return View::make('prediction.form')->with('matches', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$matches = Match::all();
		foreach ($matches as $match) {
			$prediction = [];
			$prediction['user_id'] = Auth::user()->id;
			$prediction['match_id'] = $match->id;
			$prediction['score_a'] = Input::get($match->team_a_id);
			$prediction['score_b'] = Input::get($match->team_b_id);
			//validations
			$result = Prediction::create($prediction);
			// dd($result->id);
		}
		//change playing status
		$user = User::findOrFail(Auth::user()->id);
		$user->playing = 1;
		$user->save();

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
			$user = User::findOrFail($id);

			$predictions = $user->predictions()->get();
			$data = new stdClass();
			$data->user_id = $user->id;
			$data->user_name = $user->name;
			$data->user_photo = $user->photo;

			$userPredictions = [];
			foreach ($predictions as $prediction) {

				$match = Match::findOrFail($prediction->match_id);
				$teamA = Team::findOrFail($match->team_a_id);
				$teamB = Team::findOrFail($match->team_b_id);
				
				$userPrediction = new stdClass();
				$userPrediction->team_a = $teamA;
				$userPrediction->score_a = $prediction->score_a;
				$userPrediction->team_b = $teamB;
				$userPrediction->score_b = $prediction->score_b;
				$userPredictions[] = $userPrediction;

			}
			$data->user_predictions = $userPredictions;
			return View::make('prediction.show')->with('data', $data);
		} 
		catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
			// echo "404";
			App::abort(404); 
		}
	}
}
