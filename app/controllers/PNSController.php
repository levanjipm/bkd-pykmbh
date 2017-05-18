<?php

class PNSController extends \PykmbhBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pns = DB::table('pykmbh_pns')
		->select('pykmbh_pns.id', 'pykmbh_pns.NIPBaru', 'pykmbh_pns.nama', 'pykmbh_skpd.nama as skpd', 'pykmbh_pns.created_at')
		->leftJoin('pykmbh_pns_skpd', 'pykmbh_pns_skpd.pnsId', '=', 'pykmbh_pns.id')
		->leftJoin('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdId')
		->get();

		$this->layout->content = View::make('pns.index')->with('pns', $pns);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('pns.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nipbaru'		=> 'required',
			'nama'			=> 'required',
			'jeniskelamin'	=> 'required',
			'agama'			=> 'required',
			'tempatlahir'	=> 'required',
			'tanggallahir'	=> 'required',
			'hukum'			=> 'required',
			'jenis'			=> 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$pns = new PNS;
			$pns->NIPBaru = Input::get('nipbaru');
			$pns->NIPLama = Input::get('niplama');
			$pns->nama = Input::get('nama');
			$pns->jenisKelamin = Input::get('jeniskelamin');
			$pns->agama = Input::get('agama');
			$pns->gelarDepan = Input::get('gelardepan');
			$pns->gelarBelakang = Input::get('gelarbelakang');
			$pns->tempatLahir = Input::get('tempatlahir');
			$pns->tanggalLahir = Input::get('tanggallahir');
			$pns->kedudukanHukum = Input::get('hukum');
			$pns->jenisPegawai = Input::get('jenis');
			
			if ($pns->save()) 
				return Redirect::to('data/pns')->with('message', 'Data PNS telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('data/pns/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pns = PNS::find($id);

		$pnsskpd = DB::table('pykmbh_pns_skpd')
		->select('pykmbh_skpd.nama as skpd', 'pykmbh_pns_skpd.created_at')
		->join('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdId')
		->where('pykmbh_pns_skpd.pnsId', '=', $id)
		->get();

		$pnsdiklat = DB::table('pykmbh_pns_diklat')
		->select('pykmbh_diklat.nama', 'pykmbh_pns_diklat.created_at', 'pykmbh_diklat.tahun')
		->join('pykmbh_diklat', 'pykmbh_diklat.id', '=', 'pykmbh_pns_diklat.diklatId')
		->where('pykmbh_pns_diklat.pnsId', '=', $id)
		->orderBy('pykmbh_pns_diklat.created_at', 'desc')
		->get();

		$pnspendidikan = DB::table('pykmbh_pns_pendidikan')
		->select('pykmbh_pendidikan.jenis', 'pykmbh_pns_pendidikan.lulus', 'pykmbh_pns_pendidikan.created_at')
		->join('pykmbh_pendidikan', 'pykmbh_pendidikan.id', '=', 'pykmbh_pns_pendidikan.pendidikanId')
		->where('pykmbh_pns_pendidikan.pnsId', '=', $id)
		->orderBy('pykmbh_pns_pendidikan.created_at', 'desc')
		->get();

		$pnspangkat = DB::table('pykmbh_pns_pangkat')
		->select('pykmbh_pangkat.golongan', 'pykmbh_pangkat.ruang', 'pykmbh_pns_pangkat.created_at')
		->join('pykmbh_pangkat', 'pykmbh_pangkat.id', '=', 'pykmbh_pns_pangkat.pangkatId')
		->where('pykmbh_pns_pangkat.pnsId', '=', $id)
		->orderBy('pykmbh_pns_pangkat.created_at', 'desc')
		->get();

		$pnsstruktural = DB::table('pykmbh_pns_skpd')
		->select('pykmbh_skpd.nama as skpd', 'pykmbh_pns_skpd.TMT as skpdtmt', 'pykmbh_pns_struktural.TMT as jabatan ', 'pykmbh_jab_struktural.nama as jabatan', 'pykmbh_pns_fungsional.', 'pykmbh_pns_fungsional.aktif')
		->leftjoin('pykmbh_jab_fungsional', 'pykmbh_jab_fungsional.id', '=', 'pykmbh_pns_fungsional.fungsionalId')
		->where('pykmbh_pns_fungsional.pnsId', '=', $id)
		->orderBy('pykmbh_pns_fungsional.created_at', 'desc')
		->get();

		$pnsfungsional = DB::table('pykmbh_pns_fungsional')
		->select('pykmbh_jab_fungsional.nama', 'pykmbh_jab_fungsional.jenis', 'pykmbh_pns_fungsional.created_at', 'pykmbh_pns_fungsional.TMT', 'pykmbh_pns_fungsional.aktif')
		->join('pykmbh_jab_fungsional', 'pykmbh_jab_fungsional.id', '=', 'pykmbh_pns_fungsional.fungsionalId')
		->where('pykmbh_pns_fungsional.pnsId', '=', $id)
		->orderBy('pykmbh_pns_fungsional.created_at', 'desc')
		->get();

		$pnsinstansikerja = DB::table('pykmbh_instansi_kerja')
		->select('pykmbh_instansi.nama', 'pykmbh_instansi_kerja.TMT', 'pykmbh_instansi_kerja.created_at')
		->join('pykmbh_instansi', 'pykmbh_instansi.id', '=', 'pykmbh_instansi_kerja.instansiId')
		->where('pykmbh_instansi_kerja.pnsId', '=', $id)
		->orderBy('pykmbh_instansi_kerja.created_at', 'desc')
		->get();

		$pnsinstansiinduk = DB::table('pykmbh_instansi_induk')
		->select('pykmbh_instansi.nama', 'pykmbh_instansi_induk.TMT', 'pykmbh_instansi_induk.created_at')
		->join('pykmbh_instansi', 'pykmbh_instansi.id', '=', 'pykmbh_instansi_induk.instansiId')
		->where('pykmbh_instansi_induk.pnsId', '=', $id)
		->orderBy('pykmbh_instansi_induk.created_at', 'desc')
		->get();
		
		$this->layout->content = View::make('pns.show')
		->with('pns', $pns)
		->with('pnsskpd', $pnsskpd)
		->with('pnsdiklat', $pnsdiklat)
		->with('pnspendidikan', $pnspendidikan)
		->with('pnsfungsional', $pnsfungsional)
		->with('pnsinstansiinduk', $pnsinstansiinduk)
		->with('pnsinstansikerja', $pnsinstansikerja)
		;

		// $historyskpd = DB::table('pykmbh_pns_skpd')
		// ->select('pykmbh_skpd.id', 'pykmbh_skpd.nama', 'pykmbh_pns_skpd.TMT', 'pykmbh_pns_skpd.created_at', 'pykmbh_pns_skpd.skpdId', 'pykmbh_pns_skpd.pnsId')
		// ->join('pykmbh_skpd', 'pykmbh_pns_skpd.skpdId', '=', 'pykmbh_skpd.id')
		// ->where('pykmbh_pns_skpd.pnsId', '=', '$id')
		// ->orderBy('pykmbh_pns_skpd.created_at', 'desc')
		// ->get();

		// $historystruktural = DB::table('pykmbh_pns_struktural')
		// ->select('pykmbh_pns_struktural.TMT', 'pykmbh_pns_struktural.aktif', 'pykmbh_pns_skpd')
		// ->join('pykmbh_skpd', 'pykmbh_pns_skpd.skpdId', '=', 'pykmbh_skpd.id')
		// ->where('pykmbh_pns_skpd.pnsId', '=', '$id')
		// ->orderBy('pykmbh_pns_skpd.created_at', 'desc')
		// ->get();


	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pns = PNS::find($id);
		$this->layout->content = View::make('pns.edit')->with('pns', $pns);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'nipbaru'		=> 'required',
			'nama'			=> 'required',
			'jeniskelamin'	=> 'required',
			'agama'			=> 'required',
			'tempatlahir'	=> 'required',
			'tanggallahir'	=> 'required',
			'hukum'			=> 'required',
			'jenis'			=> 'required'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/'.$id.'/edit')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$pns = PNS::find($id);
			$pns->NIPBaru = Input::get('nipbaru');
			$pns->NIPLama = Input::get('niplama');
			$pns->nama = Input::get('nama');
			$pns->jenisKelamin = Input::get('jeniskelamin');
			$pns->agama = Input::get('agama');
			$pns->gelarDepan = Input::get('gelardepan');
			$pns->gelarBelakang = Input::get('gelarbelakang');
			$pns->tempatLahir = Input::get('tempatlahir');
			$pns->tanggalLahir = Input::get('tanggallahir');
			$pns->kedudukanHukum = Input::get('hukum');
			$pns->jenisPegawai = Input::get('jenis');
			
			if ($pns->save()) 
				return Redirect::to('data/pns')->with('message', 'Data PNS telah diperbarui')->with('type', 1);
			
			else
				return Redirect::to('data/pns/'.$id.'/edit')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



	public function import()
	{
		

	}

	public function compare()
	{
		$pendidikan = pendidikan::all();
		$diklat = diklat::all();
		$pangkat = pangkat::all();
		$fungsional = fungsional::all();
		$skpd = SKPD::all();

		$this->layout->content = View::make('pns.compare')
		->with('pendidikan', $pendidikan)
		->with('diklat', $diklat)
		->with('pangkat', $pangkat)
		->with('fungsional', $fungsional)
		->with('skpd', $skpd);
	}

	public function comparing()
	{
	}

}
