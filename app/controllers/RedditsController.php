<?php

use DawWiki\Reddits\Reddit;
use DawWiki\Reddits\RedditTransformer;
use League\Fractal\Manager;

class RedditsController extends ApiController {

	public function __construct()
    {
        parent::__construct(new Manager);
        //Limit the users who can do more than read operations
        $this->beforeFilter('auth');
        $this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
    }
    
	/**
	 * Display a listing of the resource.
	 * GET /reddits
	 *
	 * @return Response
	 */
	public function index()
	{
		$reddits = Reddit::orderBy('name')->get();

		return $this->respondWithCollection($reddits, new RedditTransformer());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reddits
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

		if(!$inputs['name'])
		{
			return $this->errorWrongArgs();
		}

		return Reddit::create($inputs);
	}

	/**
	 * Display the specified resource.
	 * GET /reddits/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name)
	{
		$reddit = Reddit::where('name', '=', $name)->get()->first();

		return $this->respondWithItem($reddit, new RedditTransformer);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /reddits/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$reddit = Reddit::find($id);
		$inputs = Input::all();

		$reddit->name = $inputs['name'];

		$reddit->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /reddits/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return Reddit::destroy($id);
	}

}