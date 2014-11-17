<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('url');
			$table->boolean('free_resources');
			$table->boolean('free_account');
			$table->float('monthly_cost')->unsigned();
			$table->float('anual_cost')->unsigned();
			$table->float('lifetime_cost')->unsigned();
			$table->integer('rate')->unsigned();
			$table->integer('famous_id')->default(0);
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
		Schema::drop('schools');
	}

}
