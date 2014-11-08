<?php namespace DawWiki\Reddits;

use League\Fractal\TransformerAbstract;

class FavoritedRedditTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [
        'reddit'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @param FavoritedReddit $favoritedReddit
     * @return array
     */
    public function transform(FavoritedReddit $favoritedReddit)
    {
        return [
            'id'           => (int) $favoritedReddit->id,
            'user_id'      => $favoritedReddit->user_id,
            'reddit_id'    => $favoritedReddit->reddit_id,
            'title'        => $favoritedReddit->title,
            'permalink'    => $favoritedReddit->permalink,
            'posted_at'    => (int) $favoritedReddit->posted_at,
        ];
    }

    public function embedReddit(FavoritedReddit $favoritedReddit)
    {
        $reddit = $favoritedReddit->reddit;

        return $this->item($reddit, new RedditTransformer);
    }
}