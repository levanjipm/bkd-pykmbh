<?php

class SKPD extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pykmbh_skpd';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function induk()
	{
		return $this->belongsTo('SKPD', 'indukid');
	}

	public function anak()
	{
		return $this->hasMany('SKPD', 'indukid');
	}

	public function jabatan()
	{
		return $this->hasMany('jabatanSKPD', 'skpdid');
	}

}
