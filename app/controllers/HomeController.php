<?php

class HomeController extends BaseController {

	public function index()
	{
		if(Auth::check())
		{
			$currentTournament = (new TournamentRepository())->current();
			$data = Auth::user();
			if($data->playing || $currentTournament->playing)
			{
				return Redirect::to('/leaderboard');
			}
			else
			{
				return Redirect::to('/prediction/create');
			}
		}
		else
		{
			return View::make('home.index');
		}
	}

}
