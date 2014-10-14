<?php

use DawWiki\Subjects\Subject;
use DawWiki\Topics\Topic;
use Faker\Factory as Faker;

class TopicsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$subjects =  Subject::lists('id');

		foreach(range(1, 10) as $index)
		{
			Topic::create([
				'subject_id' => $faker->randomElement($subjects),
				'name' => 'Tema ' . $index
			]);
		}
	}

}