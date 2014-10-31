<?php

use DawWiki\Articles\Article;
use DawWiki\Articles\ArticleTransformer;
use League\Fractal\Manager;

class ArticlesController extends ApiController {

	public function __construct()
    {
        parent::__construct(new Manager);
        //Limit the users who can do more than read operations
        $this->beforeFilter('auth');
    }
    
	/**
	 * Display a listing of the resource.
	 * GET /articles
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::all();

		return $this->respondWithCollection($articles, new ArticleTransformer());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /articles
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();

		if(!$inputs['title'] || !$inputs['link'] || !$inputs['tags'])
		{
			return $this->errorWrongArgs();
		}

		return Article::create($inputs);
	}

	/**
	 * Display the specified resource.
	 * GET /articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::find($id);

		return $this->respondWithItem($article, new ArticleTransformer);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$article = Article::find($id);
		$inputs = Input::all();

		$article->title = $inputs['title'];
		$article->link 	= $inputs['link'];
		$article->tags  = $inputs['tags'];

		$article->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /articles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return Article::destroy($id);
	}

}