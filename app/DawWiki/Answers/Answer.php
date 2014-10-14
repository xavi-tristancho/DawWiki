<?php namespace DawWiki\Answers;

class Answer extends \Eloquent {
	protected $fillable = ['user_id', 'activity_id', 'statement'];

	protected function user () {
		return $this->belongsTo('DawWiki\Users\User');
	}

	protected function activity () {
		return $this->belongsTo('DawWiki\Activities\Activity');
	}
}