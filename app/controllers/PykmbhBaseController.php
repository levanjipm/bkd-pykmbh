<?php

class PykmbhBaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public $akun;

	public $layout = 'layouts.master';

	protected function setupLayout()
	{
		$this->akun = User::find(Sentry::getUser()->id);
		
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout)->with('akun', $this->akun);
		}
	}

}
