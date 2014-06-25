<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('team_a_id')->unsigned()->nullable();
			$table->foreign('team_a_id')->references('id')->on('teams')->onDelete('cascade');
			$table->integer('team_b_id')->unsigned()->nullable();
			$table->foreign('team_b_id')->references('id')->on('teams')->onDelete('cascade');
			$table->integer('score_a')->nullable();
			$table->integer('score_b')->nullable();
			$table->datetime('date_gt');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('matches');
	}

}
