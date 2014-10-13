<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	protected $tables = [
		'answers',
		'activities',
		'topics',
		'subjects',
		'users'
	];

	protected $seeders = [
		'UsersTableSeeder',
		'SubjectsTableSeeder',
		'TopicsTableSeeder',
		'ActivitiesTableSeeder',
		'AnswersTableSeeder'
	];

	public function run()
	{
		Eloquent::unguard();

		$this->cleanDatabase();

		foreach ($this->seeders as $seedClass) {
			$this->call($seedClass);
		}
	}

	public function cleanDatabase() {
		DB::statement('PRAGMA foreign_keys = OFF');

		foreach ($this->tables as $table) {
			DB::table($table)->truncate();
		}

		DB::statement('PRAGMA foreign_keys = ON');
	}

}
