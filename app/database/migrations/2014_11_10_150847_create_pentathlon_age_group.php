<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePentathlonAgeGroup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('pentathlon_age_group', function($table)
                {
                    $table->increments('id');
                    $table->string('age_group')->unique();
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('pentathlon_age_group');
	}

}
