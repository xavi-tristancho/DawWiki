<?php namespace DawWiki\Answers;

class Answer extends \Eloquent {

	protected $fillable = ['user_id', 'activity_id', 'statement'];

	public function user() {

		return $this->belongsTo('DawWiki\Users\User');
	}

	public function activity() {

		return $this->belongsTo('DawWiki\Activities\Activity');
	}
}