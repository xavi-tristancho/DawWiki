<?php

use DawWiki\Famouses\Famous;
use DawWiki\Famouses\FamousTransformer;
use League\Fractal\Manager;

class FamousesController extends ApiController {

	public function __construct()
    {
        parent::__construct(new Manager);
        //Limit the users who can do more than read operations
        $this->beforeFilter('auth');
        $this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
    }
    
	/**
	 * Display a listing of the resource.
	 * GET /famouses
	 *
	 * @return Response
	 */
	public function index()
	{
		$famouses = Famous::orderBy('name')->get();

		return $this->respondWithCollection($famouses, new FamousTransformer());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /famouses
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

		if(!$inputs['name'] || !$inputs['description'])
		{
			return $this->errorWrongArgs();
		}

		return Famous::create($inputs);
	}

	/**
	 * Display the specified resource.
	 * GET /famouses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name)
	{
		$name = ucwords(str_replace('-', ' ', $name));

		$famous = Famous::where('name', '=', $name)->get()->first();

		return $this->respondWithItem($famous, new FamousTransformer);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /famouses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$famous = Famous::find($id);
		$inputs = Input::all();

		$famous->name 		 = $inputs['name'];
		$famous->web 		 = $inputs['web'];
		$famous->photo 		 = $inputs['photo'];
		$famous->description = $inputs['description'];
		$famous->wikipedia   = $inputs['wikipedia'];
		$famous->twitter     = $inputs['twitter'];
		$famous->github      = $inputs['github'];

		$famous->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /famouses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return Famous::destroy($id);
	}

	public function tweets($name)
	{
		$name = ucwords(str_replace('-', ' ', $name));

		$famous = Famous::where('name', '=', $name)->get()->first();

		return Twitter::searchTweetsOfAFamous($famous);

	}

}