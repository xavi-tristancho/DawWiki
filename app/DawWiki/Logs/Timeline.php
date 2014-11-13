<?php namespace DawWiki\Logs;

class Timeline extends \Eloquent {

	protected $fillable = ['user_id', 'action', 'body'];

	protected function user()
	{
		return $this->belongsTo('DawWiki\Users\User');
	}
}
