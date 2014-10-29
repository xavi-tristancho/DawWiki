<?php namespace DawWiki\Famouses;

class Famous extends \Eloquent {
	protected $fillable = ['name', 'web', 'photo', 'description', 'wikipedia', 'twitter', 'github'];
}