<?php namespace DawWiki\Subjects;

use League\Fractal\TransformerAbstract;

class SubjectTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param Subject $subject
     * @return array
     */
    public function transform(Subject $subject)
    {
        return [
            'id'           => (int) $subject->id,
            'name'         => $subject->name,
        ];
    }
}