<?php namespace DawWiki\Answers;

use DawWiki\Activities\ActivityTransformer;
use DawWiki\Users\UserTransformer;
use League\Fractal\TransformerAbstract;

class AnswerTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [
        'activity',
        'user'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @param Answer $answer
     * @return array
     */
    public function transform(Answer $answer)
    {
        return [
            'id'           => (int) $answer->id,
            'activity_id'  => (int) $answer->activity_id,
            'user_id'      => $answer->user_id,
            'statement'    => $answer->statement
        ];
    }

    /**
     * Embed Place
     *
     * @return League\Fractal\Resource\Item
     */
    public function embedActivity(Answer $answer)
    {
        $activity = $answer->activity;

        return $this->item($activity, new ActivityTransformer);
    }

    public function embedUser(Answer $answer)
    {
        $user = $answer->user;

        return $this->item($user, new UserTransformer);
    }
}