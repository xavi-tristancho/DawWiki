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

	public function show($id){

		$share = Share::find($id);

		return $this->respondWithItem($share, new ShareTransformer);
	}

	public function update($id){

		$share = Share::find($id);
		$inputs = Input::all();

		$share->name = $inputs['name'];
		$share->language = $inputs['language'];
		$share->executable = $inputs['executable'];
		$share->link = $inputs['link'];

		$share->save();
	}

	public function destroy($id){

		return Share::destroy($id);
	}
}