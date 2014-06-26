<?php

class MatchesTableSeeder extends Seeder {

	public function run()
	{
		$data =   [
				    ["team_a_id" => 1, "team_b_id" => 2],
				    ["team_a_id" => 17, "team_b_id" => 18],
				    ["team_a_id" => 5, "team_b_id" => 6],
				    ["team_a_id" => 19, "team_b_id" => 20],
				    ["team_a_id" => 9, "team_b_id" => 10],
				    ["team_a_id" => 11, "team_b_id" => 12],
				    ["team_a_id" => 13, "team_b_id" => 14],
				    ["team_a_id" => 15, "team_b_id" => 16],
				  ];

		foreach($data as $row)
		{
			Match::create($row);
		}
	}

}