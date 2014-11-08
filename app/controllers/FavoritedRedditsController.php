<?php

use DawWiki\Reddits\FavoritedReddit;
use DawWiki\Reddits\FavoritedRedditTransformer;
use League\Fractal\Manager;

class FavoritedRedditsController extends ApiController {

	public function __construct()
    {
        parent::__construct(new Manager);
        //Limit the users who can do more than read operations
        $this->beforeFilter('auth');
        $this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
    }
    
	/**
	 * Display a listing of the resource.
	 * GET /FavoritedReddit
	 *
	 * @return Response
	 */
	public function index($user)
	{
		$user = $this->getUserByName($user);

		$favoritedReddit = DawWiki\Users\User::find($user->id)->favoritedReddits;

		return $this->respondWithCollection($favoritedReddit, new FavoritedRedditTransformer());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /FavoritedReddit
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

		$inputs['user_id'] = Auth::user()->id;

		return FavoritedReddit::create($inputs);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /FavoritedReddit/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($username, $id)
	{
		return FavoritedReddit::destroy($id);
	}
}