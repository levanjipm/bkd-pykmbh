<?php

class grup3 extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pykmbh_grup3';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function parent()
	{
		return $this->belongsTo('grup2', 'grupId');
	}

}
