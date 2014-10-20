<?php
use  DawWiki\Users\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'username' => 'admin',
			'email' => 'admin@admin.com',
			'password' => 'admin',
			'role' => 'admin'
		]);

		User::create([
			'username' => 'member',
			'email' => 'member@member.com',
			'password' => 'member',
			'role' => 'member'
		]);
	}

}