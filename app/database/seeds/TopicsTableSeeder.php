<?php

use DawWiki\Subjects\Subject;
use DawWiki\Topics\Topic;
use Faker\Factory as Faker;

class TopicsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$subjects =  Subject::lists('id');

		foreach($subjects as $subject)
		{
			for($i=1; $i<=$faker->numberBetween(4,10); $i++)
			{
				Topic::create([
					'subject_id' => $subject,
					'name' => 'Tema ' . $i . ' ' . $faker->word() . $i . $faker->word()
				]);
			}

		}
	}

}