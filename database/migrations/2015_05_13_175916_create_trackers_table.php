<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trackers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('story_id')->unsigned();
			$table->string('ip');
			$table->string('country');
			$table->string('device');
			$table->string('browser');
			$table->string('referer');
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
		Schema::drop('trackers');
	}

}
