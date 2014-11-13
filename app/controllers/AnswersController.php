<?php

use DawWiki\Answers\Answer;
use DawWiki\Answers\AnswerTransformer;
use DawWiki\Answers\Observers\AnswerObserver;
use League\Fractal\Manager;

class AnswersController extends ApiController {

	public function __construct()
	{
		parent::__construct(new Manager);
		//Limit the users who can do more than read operations
		//$this->beforeFilter('role:owner', ['on' => ['put', 'patch', 'delete']]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /answers
	 *
	 * @return Response
	 */
	public function index()
	{
		$answers = Answer::orderBy('created_at', 'desc')->take(5)->get();

		return $this->respondWithCollection($answers, new AnswerTransformer);
	}

	public function show($id){

		$answer = Answer::find($id);

		return $this->respondWithItem($answer, new AnswerTransformer);
	}

	public function store()
	{
		$inputs = Input::all();

		if($inputs['statement'] != '')
		{

			Answer::observe(new AnswerObserver);

			return Answer::create([
				'activity_id' => $inputs['activity_id'],
				'user_id'     => Auth::user()->id,
				'statement'   => $inputs['statement']
			]);
		}

		return $this->errorWrongArgs();
	}

	public function update($id){

		$answer = Answer::find($id);
		$inputs = Input::all();

		$answer->statement = $inputs['statement'];

		$answer->save();
	}

	public function destroy($id){

		$answer = Answer::findOrFail($id);

		// Is the user allowed to delete the answer?
		if($this->iAmAdminWhoWroteThis($answer) || $this->iAmCreator($answer) || $this->writedByAMember($answer))
		{
				return Answer::destroy($id);
        }

		return $this->errorForbidden();
	}

}
