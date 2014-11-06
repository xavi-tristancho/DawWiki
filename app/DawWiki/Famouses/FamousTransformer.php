<?php namespace DawWiki\Famouses;

use League\Fractal\TransformerAbstract;
use DawWiki\Articles\ArticleTransformer;

class FamousTransformer extends TransformerAbstract
{
    protected $availableEmbeds = [
        'articles'
    ];

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

    public function embedArticles(Famous $famous)
    {
        $articles = $famous->articles;

        return $this->collection($articles, new ArticleTransformer);
    }
}