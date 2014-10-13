<?php namespace DawWiki\Answers;

class Answer extends \Eloquent {
	protected $fillable = ['user_id', 'activity_id', 'statement'];
}