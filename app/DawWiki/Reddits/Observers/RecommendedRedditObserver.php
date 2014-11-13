<?php namespace DawWiki\Reddits\Observers;

use DawWiki\Logs\Timeline;
use DawWiki\Reddits\RecommendedReddit;

class RecommendedRedditObserver{

  public static function created($model)
  {
    $body = '<a href=\'http://www.reddit.com'. $model->permalink .'\'>'. $model->title .'</a>';

    Timeline::create([

      'user_id' => $model->user_id,
      'action'  => 'recommend',
      'body'    => $body
    ]);
  }
}
