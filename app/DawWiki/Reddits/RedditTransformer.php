<?php namespace DawWiki\Reddits;

use League\Fractal\TransformerAbstract;

class RedditTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param Reddit $reddit
     * @return array
     */
    public function transform(Reddit $reddit)
    {
        return [
            'id'           => (int) $reddit->id,
            'name'         => $reddit->name,
        ];
    }
}