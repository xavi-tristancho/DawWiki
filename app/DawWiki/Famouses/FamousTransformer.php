<?php namespace DawWiki\Famouses;

use League\Fractal\TransformerAbstract;

class FamousTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param Famous $famous
     * @return array
     */
    public function transform(Famous $famous)
    {
        return [
            'id'           => (int) $famous->id,
            'name'         => $famous->name,
            'web'          => $famous->web,
            'photo'        => $famous->photo,
            'description'  => $famous->description,
            'wikipedia'    => $famous->wikipedia,
            'twitter'      => $famous->twitter,
            'github'       => $famous->github
        ];
    }
}