<?php namespace DawWiki\Activities;

class Activity extends \Eloquent {
	protected $fillable = ['topic_id', 'title', 'statement'];

	protected function topic()
	{
		return $this->belongsTo('DawWiki\Topics\Topic');
	}

	protected function answers () {
		return $this->hasMany('DawWiki\Answers\Answer');
	}
}