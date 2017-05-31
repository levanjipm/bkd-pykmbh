<?php

class grup2 extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pykmbh_grup2';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function parent()
	{
		return $this->belongsTo('grup1', 'grupId');
	}

	public function child()
	{
		return $this->hasMany('grup3', 'grupId');
	}

}
