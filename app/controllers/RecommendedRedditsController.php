<?php

use DawWiki\Reddits\RecommendedReddit;
use DawWiki\Reddits\RecommendedRedditTransformer;
use DawWiki\Reddits\Observers\RecommendedRedditObserver;
use League\Fractal\Manager;

class RecommendedRedditsController extends ApiController {

	public function __construct()
  {
		parent::__construct(new Manager);
    //Limit the users who can do more than read operations
    $this->beforeFilter('auth');
    $this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
  }

	/**
	 * Display a listing of the resource.
	 * GET /RecommendedReddit
	 *
	 * @return Response
	 */
	public function index()
	{
		$recommendedReddits = RecommendedReddit::all();

		return $this->respondWithCollection($recommendedReddits, new RecommendedRedditTransformer());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /RecommendedReddit
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

		$inputs['user_id'] = Auth::user()->id;

		RecommendedReddit::observe(new RecommendedRedditObserver);

		RecommendedReddit::create($inputs);
	}
}
