<?php namespace DawWiki\Reddits;

use League\Fractal\TransformerAbstract;
use DawWiki\Users\UserTransformer;

class RecommendedRedditTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [
        'reddit',
        'user'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @param RecommendedReddit $recommendedReddit
     * @return array
     */
    public function transform(RecommendedReddit $recommendedReddit)
    {
        return [
            'id'           => (int) $recommendedReddit->id,
            'user_id'      => $recommendedReddit->user_id,
            'reddit_id'    => $recommendedReddit->reddit_id,
            'title'        => $recommendedReddit->title,
            'permalink'    => $recommendedReddit->permalink,
            'posted_at'    => (int) $recommendedReddit->posted_at,
        ];
    }

    public function embedReddit(RecommendedReddit $recommendedReddit)
    {
        $reddit = $recommendedReddit->reddit;

        return $this->item($reddit, new RedditTransformer);
    }

    public function embedUser(RecommendedReddit $recommendedReddit)
    {
        $user = $recommendedReddit->user;

        return $this->item($user, new UserTransformer);
    }
}