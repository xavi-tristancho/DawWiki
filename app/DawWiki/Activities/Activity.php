<?php namespace DawWiki\Activities;

class Activity extends \Eloquent {
	protected $fillable = ['topic_id', 'title', 'statement'];
}