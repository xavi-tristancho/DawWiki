<?php

use DawWiki\Answers\Answer;
use DawWiki\Users\User;
use DawWiki\Activities\Activity;
use Faker\Factory as Faker;

class AnswersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$users = User::lists('id');
		$activities = Activity::lists('id');

		foreach(range(1, 200) as $index)
		{
			Answer::create([
				'user_id' => $faker->randomElement($users),
				'activity_id' => $faker->randomElement($activities),
				'statement' => $faker->sentence(6)
			]);
		}
	}

}