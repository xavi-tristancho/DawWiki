<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTimelinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('timelines', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->enum('action', ['recommend', 'reply', 'create', 'update', 'delete']);
			$table->text('body');
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
		Schema::drop('timelines');
	}

}
