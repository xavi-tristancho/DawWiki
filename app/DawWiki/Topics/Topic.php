<?php namespace DawWiki\Topics;

class Topic extends \Eloquent {
	protected $fillable = ['subject_id', 'name'];

	protected function subject()
	{
		return $this->belongsTo('DawWiki\Subjects\Subject');
	}
}