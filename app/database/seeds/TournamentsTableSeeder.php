<?php

class TournamentsTableSeeder extends Seeder {

	public function run()
	{
		$data =   [
				    ["name" => 'Octavos de Final', "id" => 1],
				    ["name" => 'Cuartos de Final', "id" => 2],
				    ["name" => 'Semifinales', "id" => 3],
				    ["name" => 'Finales', "id" => 4],
				  ];

		foreach($data as $row)
		{
			Tournament::create($row);
		}
	}

}