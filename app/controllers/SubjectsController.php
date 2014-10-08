<?php

use DawWiki\Subjects\Subject;

class SubjectsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /subjects
	 *
	 * @return Response
	 */
	public function index()
	{
		return Subject::all();
	}
}