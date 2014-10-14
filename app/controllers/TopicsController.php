<?php

use DawWiki\Topics\Topic;
use DawWiki\Topics\TopicTransformer;
use League\Fractal\Manager;

class TopicsController extends ApiController {

	public function __construct()
	{
		parent::__construct(new Manager);
		//Limit the users who can do more than read operations
		$this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /topics
	 *
	 * @return Response
	 */
	public function index()
	{
		$topics =  Topic::all();

		return $this->respondWithCollection($topics, new TopicTransformer);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /topics
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();
		 
		return Topic::create($inputs);
	}

	/**
	 * Display the specified resource.
	 * GET /topics/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Topic::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /topics/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$topic = Topic::find($id);
		$inputs = Input::all();

		// subject_id validation required
		$topic->subject_id = $inputs['subject_id'];
		$topic->name = $inputs['name'];

		$topic->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /topics/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return Topic::destroy($id);
	}

}