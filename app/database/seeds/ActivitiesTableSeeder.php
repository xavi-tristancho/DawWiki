<?php

use DawWiki\Activities\Activity;
use DawWiki\Topics\Topic;
use Faker\Factory as Faker;

class ActivitiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$topics = Topic::lists('id');

		foreach($topics as $topic)
		{
			for($i=1; $i<=$faker->numberBetween(4,10); $i++) {

				Activity::create([
					'topic_id' => $topic,
					'title' => 'Activitat ' . $i,
					'statement' => $faker->sentence(6)
				]);
			}
		}
	}

}