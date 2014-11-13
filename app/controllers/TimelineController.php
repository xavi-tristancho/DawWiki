<?php

use DawWiki\Logs\Timeline;
use DawWiki\Logs\TimelineTransformer;
use League\Fractal\Manager;

class TimelineController extends ApiController {

	public function __construct()
	{
		parent::__construct(new Manager);
		//Limit the users who can do more than read operations
		$this->beforeFilter('auth');
		$this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /logs
	 *
	 * @return Response
	 */
	public function index()
	{
		$timeline = Timeline::orderBy('created_at', 'desc')->get();

		return $this->respondWithCollection($timeline, new TimelineTransformer());
	}
}
