<?php

class grup1 extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pykmbh_grup1';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function child()
	{
		return $this->hasMany('grup2', 'grupId');
	}

}
