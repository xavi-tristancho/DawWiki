<?php namespace DawWiki\Articles;

use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param Article $article
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id'           => (int) $article->id,
            'title'         => $article->title,
            'link'          => $article->link,
            'tags'          => $this->formatTags($article->tags)
        ];
    }

    private function formatTags($tags)
    {
        return $arrayOfTags = explode(',', $tags);
    }
}