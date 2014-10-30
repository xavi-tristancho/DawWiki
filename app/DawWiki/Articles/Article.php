<?php namespace DawWiki\Articles;

class Article extends \Eloquent {

	protected $fillable = ['title', 'link', 'tags'];
}