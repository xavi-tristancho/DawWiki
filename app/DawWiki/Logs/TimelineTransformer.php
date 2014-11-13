<?php namespace DawWiki\Logs;

use League\Fractal\TransformerAbstract;
use DawWiki\Users\UserTransformer;

class TimelineTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [
        'user'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @param Timeline $timeline
     * @return array
     */
    public function transform(Timeline $timeline)
    {
        return [
            'id'         => (int) $timeline->id,
            'user_id'    => $timeline->user_id,
            'action'     => $timeline->action,
            'body'       => $timeline->body,
            'created_at' => $timeline->created_at,
        ];
    }

    public function embedUser(Timeline $timeline)
    {
        $user = $timeline->user;

        return $this->item($user, new UserTransformer);
    }
}
