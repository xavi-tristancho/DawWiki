<?php namespace DawWiki\Activities;

use DawWiki\Topics\TopicTransformer;
use DawWiki\Answers\AnswerTransformer;
use League\Fractal\TransformerAbstract;

class ActivityTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [
        'topic',
        'answers'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @param Activity $activity
     * @return array
     */
    public function transform(Activity $activity)
    {
        return [
            'id'        => (int) $activity->id,
            'topic_id'  => (int) $activity->topic_id,
            'title'     => $activity->title,
            'statement' => $activity->statement
        ];
    }

    /**
     * Embed Topic
     *
     * @param Activity $activity
     * @return League\Fractal\Resource\Item
     */
    public function embedTopic(Activity $activity)
    {
        $topic = $activity->topic;

        return $this->item($topic, new TopicTransformer);
    }

    public function embedAnswers(Activity $activity)
    {
        $answers = $activity->answers;

        return $this->collection($answers, new AnswerTransformer);
    }
}