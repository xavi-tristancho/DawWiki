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
     * @param Anwer $answer
     * @return array
     */
    public function transform(Answer $answer)
    {
        //dd($answer);

        return [
            'id'           => (int) $answer->id,
            'activity_id'   => (int) $answer->activity_id,
            'user_id'         => $answer->user_id,
            'statement'         => $answer->statement
        ];
    }

    /**
     * Embed Place
     *
     * @return League\Fractal\Resource\Item
     */
    public function embedActivity(Answer $answers)
    {
        $activity = $answers->activity;

        return $this->item($activity, new ActivityTransformer);
    }

    public function embedUser(Answer $answers)
    {
        $user = $answers->user;

        return $this->item($user, new UserTransformer);
    }
}