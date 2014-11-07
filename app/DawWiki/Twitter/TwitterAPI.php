<?php namespace DawWiki\Twitter;

use DawWiki\Famouses\Famous;
use Guzzle\Service\Client;

class TwitterAPI{

	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function searchTweetsOfAFamous(Famous $famous)
	{
		$response = $this->client->get('statuses/user_timeline.json?screen_name='. $famous->twitter .'&count=10')->send();

		return $response->json();
	}
}