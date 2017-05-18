<?php

class StrukturOrganisasiController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$skpd = SKPD::all();

		$this->layout->content = View::make('struktur.index')->with('struktur', null)->with('select', null)->with('skpd', $skpd);
	}

	public function show()
	{
		$skpd = SKPD::all();

		if (Input::get('skpd')) 
		{
			$struktur = [];
			
			// $jabatan = jabatanSKPD::where('skpdId', $id)->get();

			$jabatan = DB::table('pykmbh_skpd_jabatan')
			->select('pykmbh_jab_struktural.id', 'pykmbh_jab_struktural.nama', 'pykmbh_jab_struktural.eselon_huruf', 'pykmbh_jab_struktural.eselon_angka', 'pykmbh_jab_struktural.indukId')
			->join('pykmbh_jab_struktural', 'pykmbh_skpd_jabatan.jabatanId', '=', 'pykmbh_jab_struktural.id')
			->where('pykmbh_skpd_jabatan.skpdId', Input::get('skpd'))
			->get();

			foreach ($jabatan as $key => $value) 
			{
				$pemilik = "Jabatan masih kosong";
				$parent = $value->indukId==0?'':"$value->indukId";

				$id = array('v' => "$value->id", "f" => $value->nama);

				$struktur[] = array(
					json_encode($id), 
					$parent,
					'Test'
					 );
			}

		}
		else
			return Redirect::to('struktur-organisasi');

		// return $struktur;

		$this->layout->content = View::make('struktur.index')->with('struktur', $struktur)->with('skpd', $skpd)->with('select', Input::get('skpd'));
	}


}
