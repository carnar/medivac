<?php

class MatchesTableSeeder extends Seeder {

	public function run()
	{
		$data =   [
				    ["tournament_id" => 1, "team_a_id" => 1, "team_b_id" => 7],
				    ["tournament_id" => 1, "team_a_id" => 9, "team_b_id" => 13],
				    ["tournament_id" => 1, "team_a_id" => 6, "team_b_id" => 3],
				    ["tournament_id" => 1, "team_a_id" => 14, "team_b_id" => 10],
				    ["tournament_id" => 1, "team_a_id" => 19, "team_b_id" => 24],
				    ["tournament_id" => 1, "team_a_id" => 25, "team_b_id" => 30],
				    ["tournament_id" => 1, "team_a_id" => 21, "team_b_id" => 17],
				    ["tournament_id" => 1, "team_a_id" => 29, "team_b_id" => 28],
				    ["tournament_id" => 2, "team_a_id" => 19 , "team_b_id" => 25],
				    ["tournament_id" => 2, "team_a_id" => 1, "team_b_id" => 9],
				    ["tournament_id" => 2, "team_a_id" => 21, "team_b_id" => 29],
				    ["tournament_id" => 2, "team_a_id" => 6, "team_b_id" => 14],
				  ];

		foreach($data as $row)
		{
			Match::create($row);
		}
	}

}