<?php namespace DawWiki\Topics;

class Topic extends \Eloquent {
	protected $fillable = ['subject_id', 'name'];

	protected function activities ()
	{
		return $this->hasMany('DawWiki\Activities\Activity');
	}

	protected function subject()
	{
		return $this->belongsTo('DawWiki\Subjects\Subject');
	}
}