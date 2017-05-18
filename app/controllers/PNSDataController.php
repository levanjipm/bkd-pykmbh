<?php

class PNSDataController extends \PykmbhBaseController {

	public function pendidikan($id)
	{
		$rules = array(
			'pendidikan' => 'required',
			'tahun' => 'integer'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id)->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$success = DB::table('pykmbh_pns_pendidikan')->insert(array('pnsId' => $id, 'pendidikanId' => Input::get('pendidikan'), 'lulus' => Input::get('tahun') ));
			
			if ($success) 
				return Redirect::to('data/pns/'.$id)->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pns/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}

	public function diklat($id)
	{
		$rules = array(
			'diklat' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id)->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$success = DB::table('pykmbh_pns_diklat')->insert(array('pnsId' => $id, 'diklatId' => Input::get('diklat') ));
			
			if ($success) 
				return Redirect::to('data/pns/'.$id)->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pns/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}

	public function skpd($id)
	{
		$rules = array(
			'skpd' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id)->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			DB::table('pykmbh_pns_skpd')->where('pnsId', $id)->update(array('aktif' => 0 ));
			
			$success = DB::table('pykmbh_pns_skpd')->insert(array('pnsId' => $id, 'skpdId' => Input::get('skpd'), 'TMT' => Input::get('tmt') ));

			if ($success) 
				return Redirect::to('data/pns/'.$id)->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pns/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}

	public function pangkat($id)
	{
		$rules = array(
			'pangkat' => 'required',
			'tmt' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id)->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$success = DB::table('pykmbh_pns_pangkat')->insert(array('pnsId' => $id, 'pangkatId' => Input::get('pangkat'), 'TMT' => Input::get('tmt') ));
			
			if ($success) 
				return Redirect::to('data/pns/'.$id)->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pns/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}

	public function instansiKerja($id)
	{
		$rules = array(
			'instansi' => 'required',
			'tmt' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id)->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$success = DB::table('pykmbh_instansi_kerja')->insert(array('pnsId' => $id, 'instansiId' => Input::get('isntansi'), 'TMT' => Input::get('tmt') ));
			
			if ($success) 
				return Redirect::to('data/pns/'.$id)->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pns/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}

	public function instansiInduk($id)
	{
		$rules = array(
			'instansi' => 'required',
			'tmt' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id)->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$success = DB::table('pykmbh_instansi_induk')->insert(array('pnsId' => $id, 'instansiId' => Input::get('isntansi'), 'TMT' => Input::get('tmt') ));
			
			if ($success) 
				return Redirect::to('data/pns/'.$id)->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pns/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}

	public function struktural($id)
	{
		$rules = array(
			'' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id)->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			
			if ($success) 
				return Redirect::to('data/pns/'.$id)->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pns/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}

	public function fungsional($id)
	{
		$rules = array(
			'fungsional' => 'required',
			'tmt' => 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id)->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			DB::table('pykmbh_pns_fungsional')->where('pnsId', $id)->update(array('aktif' => 0 ));
			
			$success = DB::table('pykmbh_pns_fungsional')->insert(array('pnsId' => $id, 'fungsionalId' => Input::get('fungsional'), 'TMT' => Input::get('tmt') ));
			
			if ($success) 
			{	
				return Redirect::to('data/pns/'.$id)->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			}
			else
				return Redirect::to('data/pns/'.$id)->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}

}
