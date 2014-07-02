<?php

class HomeController extends BaseController {

	public function index()
	{
		if(Auth::check())
		{
			$data = Auth::user();
			if($data->playing)
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
