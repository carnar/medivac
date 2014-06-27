<?php

class MatchesTableSeeder extends Seeder {

	public function run()
	{
		$data =   [
				    ["team_a_id" => 1, "team_b_id" => 7],
				    ["team_a_id" => 9, "team_b_id" => 13],
				    ["team_a_id" => 6, "team_b_id" => 3],
				    ["team_a_id" => 14, "team_b_id" => 10],
				    ["team_a_id" => 19, "team_b_id" => 24],
				    ["team_a_id" => 25, "team_b_id" => 30],
				    ["team_a_id" => 21, "team_b_id" => 17],
				    ["team_a_id" => 29, "team_b_id" => 28],
				  ];

		foreach($data as $row)
		{
			Match::create($row);
		}
	}

}