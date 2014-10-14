<?php

use DawWiki\Activities\Activity;
use DawWiki\Topics\Topic;
use Faker\Factory as Faker;

class ActivitiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$topics = Topic::lists('id');

		foreach(range(1, 10) as $index)
		{
			Activity::create([
				'topic_id' => $faker->randomElement($topics),
				'title' => 'Activitat ' . $index,
				'statement' => $faker->sentence(6)
			]);
		}
	}

}