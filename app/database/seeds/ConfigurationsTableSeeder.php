<?php

class ConfigurationsTableSeeder extends Seeder {

	public function run()
	{
		$data =   [
				    ["name" => "current_tournament_id", "value" => "0"],
				  ];

		foreach($data as $row)
		{
			Configuration::create($row);
		}
	}

}