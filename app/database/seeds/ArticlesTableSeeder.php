<?php

use DawWiki\Articles\Article;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 200) as $index)
		{
			Article::create([
				'title' => $faker->sentence(),
				'link' => $faker->url,
				'tags' => $faker->word . ', ' . $faker->word . ', ' . $faker->word
			]);
		}
	}

}