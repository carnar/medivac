<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('TeamsTableSeeder');
		$this->call('MatchesTableSeeder');

		// $this->call('UserTableSeeder');
	}

}
