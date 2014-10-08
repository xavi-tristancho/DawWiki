<?php

use DawWiki\Subjects\Subject;

class SubjectsTableSeeder extends Seeder {

	private $subjects = [

		'Empresa emprenedora',
		'Desenvolupament web servidor',
		'Desenvolupament web client',
		'Desplegament d\'aplicacions',
		'Disseny interficies web'
	];

	public function run()
	{
		foreach($this->subjects as $subject)
		{
			Subject::create([

				'name' => $subject
			]);
		}
	}
}