<?php

use DawWiki\Shares\Share;
use DawWiki\Shares\ShareTransformer;

class SharesController extends ApiController {

	/**
	 * Display a listing of the resource.
	 * GET /Shares
	 *
	 * @return Response
	 */
	public function index()
	{
		$shares = Share::all();

		return $this->respondWithCollection($shares, new ShareTransformer);
	}

	public function store(){

		$inputs = Input::all();

		return Share::create($inputs);
	}

	public function destroy($id){

		return Share::destroy($id);
	}
}