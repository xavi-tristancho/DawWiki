<?php

use DawWiki\Shares\Share;

class SharesTableSeeder extends Seeder {

	private $tools = [

			[
				'name' => 'Gist',
				'language' => 'All',
				'executable' => 0
			],
			[
				'name' => 'Laravel Bin',
				'language' => 'PHP',
				'executable' => 0
			],
			[
				'name' => 'JSFiddle',
				'language' => 'javascript',
				'executable' => 1
			]
	];

	public function run()
	{
		foreach($this->tools as $tool)
		{
			Share::create([
				'name' => $tool['name'],
				'language' => $tool['language'],
				'executable' => $tool['executable']
			]);
		}
	}

}