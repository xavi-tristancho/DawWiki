<?php namespace DawWiki\Reddits;

class FavoritedReddit extends \Eloquent {
	
	protected $fillable = ['user_id', 'reddit_id', 'title', 'permalink', 'posted_at'];

	public function reddit()
	{
		return $this->belongsTo('DawWiki\Reddits\Reddit');
	}

	public function user()
	{
		return $this->belongsTo('DawWiki\Users\User');
	}
}