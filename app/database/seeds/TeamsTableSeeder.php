<?php

class TeamsTableSeeder extends Seeder {

	public function run()
	{
		$data =   [
				    ["name" => "Brasil", "country_code" => "", "code" => "BRA"],
				    ["name" => "Croacia", "country_code" => "", "code" => "CRO"],
				    ["name" => "México", "country_code" => "", "code" => "MEX"],
				    ["name" => "Camerún", "country_code" => "", "code" => "CMR"],
				    ["name" => "España", "country_code" => "", "code" => "ESP"],
				    ["name" => "Holanda", "country_code" => "", "code" => "NED"],
				    ["name" => "Chile", "country_code" => "", "code" => "CHI"],
				    ["name" => "Australia", "country_code" => "", "code" => "AUS"],
				    ["name" => "Colombia", "country_code" => "", "code" => "COL"],
				    ["name" => "Grecia", "country_code" => "", "code" => "GRE"],
				    ["name" => "Costa de Marfil", "country_code" => "", "code" => "CIV"],
				    ["name" => "Japón", "country_code" => "", "code" => "JPN"],
				    ["name" => "Uruguay", "country_code" => "", "code" => "URU"],
				    ["name" => "Costa Rica", "country_code" => "", "code" => "CRC"],
				    ["name" => "Inglaterra", "country_code" => "", "code" => "ENG"],
				    ["name" => "Italia", "country_code" => "", "code" => "ITA"],
				    ["name" => "Suiza", "country_code" => "", "code" => "SUI"],
				    ["name" => "Ecuador", "country_code" => "", "code" => "ECU"],
				    ["name" => "Francia", "country_code" => "", "code" => "FRA"],
				    ["name" => "Honduras", "country_code" => "", "code" => "HON"],
				    ["name" => "Argentina", "country_code" => "", "code" => "ARG"],
				    ["name" => "Bosnia y Herzegovina", "country_code" => "", "code" => "BIH"],
				    ["name" => "Irán", "country_code" => "", "code" => "IRN"],
				    ["name" => "Nigeria", "country_code" => "", "code" => "NGA"],
				    ["name" => "Alemania", "country_code" => "", "code" => "GER"],
				    ["name" => "Portugal", "country_code" => "", "code" => "POR"],
				    ["name" => "Ghana", "country_code" => "", "code" => "GHA"],
				    ["name" => "Estados unidos", "country_code" => "", "code" => "USA"],
				    ["name" => "Bélgica", "country_code" => "", "code" => "BEL"],
				    ["name" => "Argelia", "country_code" => "", "code" => "ALG"],
				    ["name" => "Rusia", "country_code" => "", "code" => "RUS"],
				    ["name" => "República de Corea", "country_code" => "", "code" => "KOR"]
				  ];

		foreach($data as $row)
		{
			Team::create($row);
		}
	}

}