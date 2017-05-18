<?php

class PNSSKPD extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pykmbh_skpd_jabatan';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function skpd()
	{
		return $this->belongsTo('SKPD', 'skpdId');
	}

	public function jabatan()
	{
		return $this->belongsTo('struktural', 'jabatanId');
	}

}
