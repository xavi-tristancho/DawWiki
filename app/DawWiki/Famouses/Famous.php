<?php namespace DawWiki\Famouses;

class Famous extends \Eloquent {
	protected $fillable = ['name', 'web', 'photo', 'description', 'wikipedia', 'twitter', 'github'];

	public function articles()
	{
		return $this->hasMany('DawWiki\Articles\Article');
	}
}