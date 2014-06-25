<?php

class PredictionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
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
		$predictions = User::findOrFail($id)->predictions();
		//dd($predictions);

		foreach ($predictions as $prediction) {
			echo 'llega';
			// echo $predition->match_id . '</br>';
			// echo $predition->score_a . '</br>';
			// echo $predition->score_b . '</br>';
			echo '</br>';
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
