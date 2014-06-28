<?php

class ConfigurationsTableSeeder extends Seeder {

	public function run()
	{
		$data =   [
				    ["name" => "game_started", "value" => "0"],
				  ];

		foreach($data as $row)
		{
			Configuration::create($row);
		}
	}

}