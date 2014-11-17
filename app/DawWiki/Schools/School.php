<?php namespace DawWiki\Schools;

class School extends \Eloquent {
	protected $guarded = ['id', 'created_at', 'updated_at'];

	protected function famous() {
		return $this->BelongsTo('DawWiki\Famouses\Famous');
	}
}