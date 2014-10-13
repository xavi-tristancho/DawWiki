<?php namespace DawWiki\Subjects;

use DawWiki\Topics\TopicTransformer;
use League\Fractal\TransformerAbstract;
use DawWiki\Subjects\Subject;

class SubjectTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [
        'topics'
    ];

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

    /**
     * Embed Topics
     *
     * @param Subject $subject
     * @return League\Fractal\Resource\Collection
     */
    public function embedTopics(Subject $subject)
    {
        $topics = $subject->topics;

        return $this->collection($topics, new TopicTransformer);
    }
}