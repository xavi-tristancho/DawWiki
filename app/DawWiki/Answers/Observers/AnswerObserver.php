<?php namespace DawWiki\Answers\Observers;

use DawWiki\Logs\Timeline;
use DawWiki\Answers\Answer;

class AnswerObserver{

  public function created($model)
  {
    $subject = $model->activity->topic->subject->name;

    $topic = $model->activity->topic->name;

    $activity = $model->activity;

    $route = "subjects/{$this->slugify($subject)}/topics/{$this->slugify($topic)}/activities/{$activity->id}";

    $text = "[{$activity->category}] {$activity->title}, {$topic} de l'assignatura: {$subject}";

    $body = "<a href='#/{$route}'>{$text}</a>";

    Timeline::create([

      'user_id' => $model->user_id,
      'action'  => 'reply',
      'body'    => $body
    ]);
  }

  private function slugify($string)
  {
    return strtolower(str_replace(' ', '-', $string));
  }
}
