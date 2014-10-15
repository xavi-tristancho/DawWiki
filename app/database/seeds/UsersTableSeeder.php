<?php
use  DawWiki\Users\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
				'username' => $faker->word . $index,
				'email' => $faker->email,
				'password' => 'secret',
				'role' => 'member'
			]);
		}

		User::create([
			'username' => 'admin',
			'email' => 'admin@admin.com',
			'password' => 'admin',
			'role' => 'admin'
		]);
	}

}