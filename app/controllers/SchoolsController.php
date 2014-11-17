<?php

use DawWiki\Schools\School;
use DawWiki\Schools\SchoolTransformer;
use League\Fractal\Manager;

class SchoolsController extends ApiController {

	public function __construct()
    {
        parent::__construct(new Manager);
        //Limit the users who can do more than read operations
        $this->beforeFilter('auth');
        $this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
    }

	/**
	 * Display a listing of the resource.
	 * GET /schools
	 *
	 * @return Response
	 */
	public function index()
	{
		$schools=School::all();

		return $this->respondWithCollection($schools, new SchoolTransformer());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /schools
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

		if(!$inputs['name'] || !$inputs['url'])
		{
			return $this->errorWrongArgs();
		}

		return School::create($inputs);
	}

	/**
	 * Display the specified resource.
	 * GET /schools/{name}
	 *
	 * @param  int  $name
	 * @return Response
	 */
	public function show($name)
	{
		$name = ucwords(str_replace('-', ' ', $name));

		$school = School::where('name', '=', $name)->get()->first();

		return $this->respondWithItem($school, new SchoolTransformer);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /schools/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$school = School::find($id);
		$inputs = Input::all();

		$school->name 		 	    = $inputs['name'];
		$school->url 		 	      = $inputs['url'];
		$school->free_resources = $inputs['free_resources'];
		$school->free_account 	= $inputs['free_account'];
		$school->currency       = $inputs['currency'];
		$school->monthly_cost   = $inputs['monthly_cost'];
		$school->anual_cost     = $inputs['anual_cost'];
		$school->lifetime_cost  = $inputs['lifetime_cost'];
		$school->rate 		 	    = $inputs['rate'];

		$school->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /schools/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return School::destroy($id);
	}

}
