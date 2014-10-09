<?php namespace DawWiki\Shares;

use League\Fractal\TransformerAbstract;

class ShareTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param Share $subject
     * @return array
     */
    public function transform(Share $share)
    {
        return [
            'id'           => (int) $share->id,
            'name'         => $share->name,
            'language'         => $share->language,
            'executable'         => $share->executable,
        ];
    }
}