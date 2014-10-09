<?php namespace DawWiki\Shares;

class Share extends \Eloquent {

	protected $fillable = ['name' , 'language' , 'executable' , 'link'];
}