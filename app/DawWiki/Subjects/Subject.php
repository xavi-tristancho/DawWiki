<?php namespace DawWiki\Subjects;

class Subject extends \Eloquent {

	protected $fillable = ['name'];

	public function topics()
	{
		return $this->hasMany('DawWiki\Topics\Topic');
	}
}