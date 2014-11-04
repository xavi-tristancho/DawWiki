<?php namespace DawWiki\Activities;

class Activity extends \Eloquent {

	protected $fillable = ['topic_id', 'title', 'category', 'statement'];

	public function topic()
	{
		return $this->belongsTo('DawWiki\Topics\Topic');
	}

	//relacio que falla
	public function answers()
	{
		return $this->hasMany('DawWiki\Answers\Answer');
	}
}