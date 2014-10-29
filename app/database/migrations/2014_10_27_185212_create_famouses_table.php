<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamousesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('famouses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('web');
			$table->string('photo');
			$table->text('description');
			$table->string('wikipedia');
			$table->string('twitter');
			$table->string('github');
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
		Schema::drop('famouses');
	}

}
