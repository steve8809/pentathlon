<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePentathlonCompetitor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pentathlon_competitor', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name', 255);
                        $table->unsignedInteger('country_id');
                        $table->foreign('country_id')->references('id')->on('pentathlon_country');
                        $table->date('birthday');
                        $table->unsignedInteger('club_id');
                        $table->foreign('club_id')->references('id')->on('pentathlon_club');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pentathlon_competitor');
	}

}