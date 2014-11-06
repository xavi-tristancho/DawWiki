<?php namespace DawWiki\Articles;

class Article extends \Eloquent {

	protected $fillable = ['title', 'link', 'tags', 'famous_id'];

	public function famous()
	{
		return $this->belongsTo('DawWiki\Famouses\Famous');
	}
}