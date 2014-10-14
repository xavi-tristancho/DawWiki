<?php

use DawWiki\Answers\Answer;
use League\Fractal\Manager;

class AnswersController extends ApiController {

	public function __construct()
	{
		parent::__construct(new Manager);
		//Limit the users who can do more than read operations
		$this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
		//$this->beforeFilter('role:owner', ['on' => ['post', 'put', 'patch', 'delete']]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /answers
	 *
	 * @return Response
	 */
	public function index()
	{
		return Answer::all();
	}

	public function show($id){

		$answer = Answer::find($id);

		return $answer;
	}

	public function store()
	{
		$inputs = Input::all();

		return Answer::create($inputs);
	}

	public function update($id){

		$answer = Answer::find($id);
		$inputs = Input::all();

		$answer->statement = $inputs['statement'];

		$answer->save();
	}

	public function destroy($id){

		return Answer::destroy($id);
	}
}