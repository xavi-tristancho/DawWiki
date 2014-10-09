<?php

use DawWiki\Shares\Share;

class SharesTableSeeder extends Seeder {

	private $tools = [

			[
				'name' => 'Gist',
				'language' => 'All',
				'executable' => 0,
				'link' => 'https://gist.github.com'
			],
			[
				'name' => 'Laravel Bin',
				'language' => 'PHP',
				'executable' => 0,
				'link' => 'http://laravel.io/bin/'
			],
			[
				'name' => 'JSFiddle',
				'language' => 'javascript',
				'executable' => 1,
				'link' => 'http://jsfiddle.net/'
			]
	];

	public function run()
	{
		foreach($this->tools as $tool)
		{
			Share::create([
				'name' => $tool['name'],
				'language' => $tool['language'],
				'executable' => $tool['executable'],
				'link' => $tool['link']
			]);
		}
	}

}