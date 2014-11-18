<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePentathlonClub extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('pentathlon_club', function($table)
                {
                    $table->increments('id');
                    $table->string('name')->unique();
                    $table->string('town');
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('pentathlon_club');
	}

}
