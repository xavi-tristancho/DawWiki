<?php namespace DawWiki\Schools;

use League\Fractal\TransformerAbstract;
use DawWiki\Famouses\FamousTransformer;

class SchoolTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [
        'famous'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @param School $school
     * @return array
     */
    public function transform(School $school)
    {
        return [
            'id'             => (int) $school->id,
            'name'           => $school->name,
            'url'            => $school->url,
            'free_resources' => $school->free_resources,
            'free_account'   => $school->free_account,
            'currency'   => $school->currency,
            'monthly_cost'   => $school->monthly_cost,
            'anual_cost'     => $school->anual_cost,
            'lifetime_cost'  => $school->lifetime_cost,
            'rate'           => $school->rate,
            'famous_id'      => $school->famous_id
        ];
    }

    public function embedFamous(School $school)
    {
        $famous = $school->famous;

        return $this->item($famous, new FamousTransformer);
    }
}
