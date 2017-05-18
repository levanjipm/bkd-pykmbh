<?php

class struktural extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pykmbh_jab_struktural';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function atasan()
	{
		return $this->belongsTo('struktural', 'indukId');
	}

	public function bawahan()
	{
		return $this->hasMany('struktural', 'indukId');
	}

}
