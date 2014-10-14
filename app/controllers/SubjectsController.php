<?php

use DawWiki\Subjects\Subject;
use DawWiki\Subjects\SubjectTransformer;
use League\Fractal\Manager;

class SubjectsController extends ApiController {

	public function __construct()
	{
		parent::__construct(new Manager);
		//Limit the users who can do more than read operations
		$this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /subjects
	 *
	 * @return Response
	 */
	public function index()
	{
		$subjects = Subject::all();

		return $this->respondWithCollection($subjects, new SubjectTransformer);
	}

	public function show($name){

		$name = ucfirst(str_replace('-', ' ', $name));

		$subject = Subject::where('name', '=', $name)->get()->first();

		return $this->respondWithItem($subject, new SubjectTransformer);
	}

	public function store()
	{
		$inputs = Input::all();

		return Subject::create($inputs);
	}

	public function update($id){

		$subject = Subject::find($id);
		$inputs = Input::all();

		$subject->name = $inputs['name'];

		$subject->save();
	}

	public function destroy($id){

		return Subject::destroy($id);
	}
}