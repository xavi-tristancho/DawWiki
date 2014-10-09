<?php

use DawWiki\Subjects\Subject;
use DawWiki\Subjects\SubjectTransformer;

class SubjectsController extends ApiController {

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

		$subject = Subject::where('name', '=', $name)->get();

		return $this->respondWithCollection($subject, new SubjectTransformer);
	}
}