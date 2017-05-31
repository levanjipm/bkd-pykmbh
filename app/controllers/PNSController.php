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
		->select('pykmbh_pns.id', 'pykmbh_pns.nipbaru', 'pykmbh_pns.nama', 'pykmbh_skpd.nama as skpd', 'pykmbh_pns.created_at')
		->leftJoin('pykmbh_pns_skpd', 'pykmbh_pns_skpd.pnsid', '=', 'pykmbh_pns.id')
		->leftJoin('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdid')
		->orderBy('nipbaru', 'asc')
		->paginate(20);

		$this->layout->content = View::make('pns.index')->with('pns', $pns);
	}

	public function search()
	{
		$pns = DB::table('pykmbh_pns')
		->select('pykmbh_pns.id', 'pykmbh_pns.nipbaru', 'pykmbh_pns.nama', 'pykmbh_skpd.nama as skpd', 'pykmbh_pns.created_at')
		->leftJoin('pykmbh_pns_skpd', 'pykmbh_pns_skpd.pnsid', '=', 'pykmbh_pns.id')
		->leftJoin('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdid')
		->orderBy('nipbaru', 'asc')
		->where('pykmbh_pns.nama', 'LIKE', '%'.Input::get('keyword').'%')
		->where('pykmbh_pns.nipbaru', 'LIKE', '%'.Input::get('keyword').'%')
		->orWhere('pykmbh_skpd.nama', 'LIKE', '%'.Input::get('keyword').'%')
		->paginate(20);

		$this->layout->content = View::make('pns.index')->with('pns', $pns)->with('keyword', Input::get('keyword'));
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
			$pns->nipbaru = Input::get('nipbaru');
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
		->join('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdid')
		->where('pykmbh_pns_skpd.pnsid', '=', $id)
		->get();

		$pnsdiklat = DB::table('pykmbh_pns_diklat')
		->select('pykmbh_diklat.nama', 'pykmbh_pns_diklat.created_at', 'pykmbh_pns_diklat.tahun')
		->join('pykmbh_diklat', 'pykmbh_diklat.id', '=', 'pykmbh_pns_diklat.diklatid')
		->where('pykmbh_pns_diklat.pnsid', '=', $id)
		->orderBy('pykmbh_pns_diklat.created_at', 'desc')
		->get();

		$pnspendidikan = DB::table('pykmbh_pns_pendidikan')
		->select('pykmbh_pendidikan.jenis', 'pykmbh_pns_pendidikan.tanggallulus', 'pykmbh_pns_pendidikan.created_at')
		->join('pykmbh_pendidikan', 'pykmbh_pendidikan.id', '=', 'pykmbh_pns_pendidikan.pendidikanid')
		->where('pykmbh_pns_pendidikan.pnsid', '=', $id)
		->orderBy('pykmbh_pns_pendidikan.created_at', 'desc')
		->get();

		$pnspangkat = DB::table('pykmbh_pns_pangkat')
		->select('pykmbh_pangkat.golongan', 'pykmbh_pns_pangkat.startdate', 'pykmbh_pns_pangkat.created_at')
		->join('pykmbh_pangkat', 'pykmbh_pangkat.id', '=', 'pykmbh_pns_pangkat.pangkatid')
		->where('pykmbh_pns_pangkat.pnsid', '=', $id)
		->orderBy('pykmbh_pns_pangkat.created_at', 'desc')
		->get();

		$pnsstruktural = DB::table('pykmbh_pns_skpd')
		->select('pykmbh_skpd.id as skpdid', 'pykmbh_skpd.nama as skpd', 'pykmbh_pns_skpd.startdate as skpdstartdate', 'pykmbh_pns_struktural.startdate as jabatanstartdate', 'pykmbh_jab_struktural.nama as jabatan', 'pykmbh_pns_struktural.startdate', 'pykmbh_pns_skpd.id as current')
		->join('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdid')
		->leftjoin('pykmbh_pns_struktural', 'pykmbh_pns_struktural.pnsskpdid', '=', 'pykmbh_pns_skpd.id')
		->leftjoin('pykmbh_skpd_jabatan', 'pykmbh_pns_struktural.skpdstrukturalid', '=', 'pykmbh_skpd_jabatan.id')
		->leftjoin('pykmbh_jab_struktural', 'pykmbh_jab_struktural.id', '=', 'pykmbh_skpd_jabatan.jabatanid')
		->where('pykmbh_pns_skpd.pnsid', '=', $id)
		->orderBy('pykmbh_pns_struktural.created_at', 'desc')
		->get();

		$pnsfungsional = DB::table('pykmbh_pns_fungsional')
		->select('pykmbh_jab_fungsional.nama', 'pykmbh_jab_fungsional.jenis', 'pykmbh_pns_fungsional.created_at', 'pykmbh_pns_fungsional.startdate', 'pykmbh_pns_fungsional.startdate')
		->join('pykmbh_jab_fungsional', 'pykmbh_jab_fungsional.id', '=', 'pykmbh_pns_fungsional.fungsionalid')
		->where('pykmbh_pns_fungsional.pnsid', '=', $id)
		->orderBy('pykmbh_pns_fungsional.created_at', 'desc')
		->get();

		$pnsinstansikerja = DB::table('pykmbh_instansi_kerja')
		->select('pykmbh_instansi.nama', 'pykmbh_instansi_kerja.startdate', 'pykmbh_instansi_kerja.created_at')
		->join('pykmbh_instansi', 'pykmbh_instansi.id', '=', 'pykmbh_instansi_kerja.instansiid')
		->where('pykmbh_instansi_kerja.pnsid', '=', $id)
		->orderBy('pykmbh_instansi_kerja.created_at', 'desc')
		->get();

		$pnsinstansiinduk = DB::table('pykmbh_instansi_induk')
		->select('pykmbh_instansi.nama', 'pykmbh_instansi_induk.startdate', 'pykmbh_instansi_induk.created_at')
		->join('pykmbh_instansi', 'pykmbh_instansi.id', '=', 'pykmbh_instansi_induk.instansiid')
		->where('pykmbh_instansi_induk.pnsid', '=', $id)
		->orderBy('pykmbh_instansi_induk.created_at', 'desc')
		->get();
		
		$this->layout->content = View::make('pns.show')
		->with('pns', $pns)
		->with('pnsskpd', $pnsskpd)
		->with('pnsdiklat', $pnsdiklat)
		->with('pnspendidikan', $pnspendidikan)
		->with('pnsfungsional', $pnsfungsional)
		->with('pnsstruktural', $pnsstruktural)
		->with('pnsinstansiinduk', $pnsinstansiinduk)
		->with('pnsinstansikerja', $pnsinstansikerja)
		->with('pnspangkat', $pnspangkat)
		;

		// $historyskpd = DB::table('pykmbh_pns_skpd')
		// ->select('pykmbh_skpd.id', 'pykmbh_skpd.nama', 'pykmbh_pns_skpd.startdate', 'pykmbh_pns_skpd.created_at', 'pykmbh_pns_skpd.skpdid', 'pykmbh_pns_skpd.pnsid')
		// ->join('pykmbh_skpd', 'pykmbh_pns_skpd.skpdid', '=', 'pykmbh_skpd.id')
		// ->where('pykmbh_pns_skpd.pnsid', '=', '$id')
		// ->orderBy('pykmbh_pns_skpd.created_at', 'desc')
		// ->get();

		// $historystruktural = DB::table('pykmbh_pns_struktural')
		// ->select('pykmbh_pns_struktural.startdate', 'pykmbh_pns_struktural.startdate', 'pykmbh_pns_skpd')
		// ->join('pykmbh_skpd', 'pykmbh_pns_skpd.skpdid', '=', 'pykmbh_skpd.id')
		// ->where('pykmbh_pns_skpd.pnsid', '=', '$id')
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
			$pns->nipbaru = Input::get('nipbaru');
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
		$diklat = diklat::orderBy('nama', 'asc')->get();
		$pangkat = pangkat::orderBy('golongan', 'asc')->get();
		$fungsional = fungsional::orderBy('nama', 'asc')->get();
		$skpd = SKPD::orderBy('nama', 'asc')->get();

		$this->layout->content = View::make('pns.compare')
		->with('pendidikan', $pendidikan)
		->with('diklat', $diklat)
		->with('pangkat', $pangkat)
		->with('fungsional', $fungsional)
		->with('skpd', $skpd);
	}

	public function comparing()
	{
		$pendidikan = pendidikan::all();
		$diklat = diklat::all();
		$pangkat = pangkat::all();
		$fungsional = fungsional::all();
		$skpd = SKPD::all();
		$rules = array(
			'pendidikan'	=> 'integer',
			'fungsional'	=> 'integer',
			'diklat'		=> 'integer',
			'skpd'			=> 'integer',
			'pangkat'		=> 'integer'
			);

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('data/pns/banding')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$pns = DB::table('pykmbh_pns')
			->select('pykmbh_pns.nama', 'pykmbh_pns.id');

			if (Input::get('pendidikan')) 
			{
				$pns = $pns->join('pykmbh_pns_pendidikan', 'pykmbh_pns_pendidikan.pnsid', '=', 'pykmbh_pns.id');
				$pns = $pns->join('pykmbh_pendidikan','pykmbh_pendidikan.id', '=', 'pykmbh_pns_pendidikan.pendidikanid');
				$pns = $pns->where('pykmbh_pns_pendidikan.pendidikanid', '=', Input::get('pendidikan'));
			}

			if (Input::get('fungsional')) 
			{
				$pns = $pns->join('pykmbh_pns_fungsional', 'pykmbh_pns_fungsional.pnsid', '=', 'pykmbh_pns.id');
				$pns = $pns->join('pykmbh_jab_fungsional','pykmbh_jab_fungsional.id', '=', 'pykmbh_pns_fungsional.fungsionalid');
				$pns = $pns->where('pykmbh_pns_fungsional.fungsionalid', '=', Input::get('fungsional'));
			}

			if (Input::get('diklat')) 
			{
				$pns->join('pykmbh_pns_diklat', 'pykmbh_pns_diklat.pnsid', '=', 'pykmbh_pns.id');
				$pns->join('pykmbh_diklat','pykmbh_diklat.id', '=', 'pykmbh_pns_diklat.diklatid');
				$pns = $pns->where('pykmbh_pns_diklat.diklatid', '=', Input::get('diklat'));
			}

			if (Input::get('skpd')) 
			{
				$pns->join('pykmbh_pns_skpd', 'pykmbh_pns_skpd.pnsid', '=', 'pykmbh_pns.id');
				$pns->join('pykmbh_skpd','pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdid');
				$pns = $pns->where('pykmbh_pns_skpd.skpdid', '=', Input::get('skpd'));
			}

			if (Input::get('pangkat')) 
			{
				$pns->join('pykmbh_pns_pangkat', 'pykmbh_pns_pangkat.pnsid', '=', 'pykmbh_pns.id');
				$pns->join('pykmbh_pangkat','pykmbh_pangkat.id', '=', 'pykmbh_pns_pangkat.pangkatid');
				$pns = $pns->where('pykmbh_pns_pangkat.pangkatid', '=', Input::get('pangkat'));
			}

			$pns = $pns->orderBy('pykmbh_pns.nama', 'asc')->get();

			$this->layout->content = View::make('pns.compare')
			->with('pns', $pns)
			->with('pendidikan', $pendidikan)
			->with('diklat', $diklat)
			->with('pangkat', $pangkat)
			->with('fungsional', $fungsional)
			->with('skpd', $skpd)
			->with('selectpendidikan', Input::get('pendidikan'))
			->with('selectdiklat', Input::get('diklat'))
			->with('selectpangkat', Input::get('pangkat'))
			->with('selectfungsional', Input::get('fungsional'))
			->with('selectskpd', Input::get('skpd'));
		
		}

		

	}

	public function pnsShow($id)
	{
		$pns = PNS::find($id);

		$pendidikan = DB::table('pykmbh_pns_pendidikan')
		->select('pykmbh_pendidikan.jenis', 'pykmbh_jurusan.nama', 'pykmbh_pns_pendidikan.tanggallulus')
		->join('pykmbh_pendidikan', 'pykmbh_pns_pendidikan.pendidikanid', '=', 'pykmbh_pendidikan.id')
		->leftjoin('pykmbh_jurusan', 'pykmbh_jurusan.id', '=', 'pykmbh_pns_pendidikan.jurusanid')
		->orderBy('pykmbh_pns_pendidikan.tanggallulus', 'desc')
		->where('pykmbh_pns_pendidikan.pnsid', $id)
		->get();

		$diklat = DB::table('pykmbh_pns_diklat')
		->select('pykmbh_diklat.nama', 'pykmbh_pns_diklat.tahun')
		->join('pykmbh_diklat', 'pykmbh_diklat.id', '=', 'pykmbh_pns_diklat.diklatid')
		->orderBy('pykmbh_pns_diklat.tahun', 'desc')
		->where('pykmbh_pns_diklat.pnsid', $id)
		->get();

		$pangkat = DB::table('pykmbh_pns_pangkat')
		->select('pykmbh_pns_pangkat.startdate', 'pykmbh_pangkat.golongan')
		->join('pykmbh_pangkat', 'pykmbh_pangkat.id', '=', 'pykmbh_pns_pangkat.pangkatid')
		->where('pykmbh_pns_pangkat.pnsid', $id)
		->whereNull('pykmbh_pns_pangkat.endDate')
		->first();

		$struktural = DB::table('pykmbh_pns_skpd')
		->select('pykmbh_skpd.id as skpdid', 'pykmbh_skpd.nama as skpd', 'pykmbh_pns_skpd.startdate as skpdstartdate', 'pykmbh_pns_struktural.startdate as jabatanstartdate', 'pykmbh_jab_struktural.nama as jabatan', 'pykmbh_pns_struktural.startdate', 'pykmbh_pns_skpd.id as current')
		->join('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdid')
		->leftjoin('pykmbh_pns_struktural', 'pykmbh_pns_struktural.pnsskpdid', '=', 'pykmbh_pns_skpd.id')
		->leftjoin('pykmbh_skpd_jabatan', 'pykmbh_pns_struktural.skpdstrukturalid', '=', 'pykmbh_skpd_jabatan.id')
		->leftjoin('pykmbh_jab_struktural', 'pykmbh_jab_struktural.id', '=', 'pykmbh_skpd_jabatan.jabatanid')
		->where('pykmbh_pns_skpd.pnsid', '=', $id)
		->orderBy('pykmbh_pns_struktural.created_at', 'desc')
		->get();

		$fungsional = DB::table('pykmbh_pns_fungsional')
		->select('pykmbh_jab_fungsional.nama', 'pykmbh_jab_fungsional.jenis', 'pykmbh_pns_fungsional.created_at', 'pykmbh_pns_fungsional.startdate', 'pykmbh_pns_fungsional.startdate')
		->join('pykmbh_jab_fungsional', 'pykmbh_jab_fungsional.id', '=', 'pykmbh_pns_fungsional.fungsionalid')
		->where('pykmbh_pns_fungsional.pnsid', '=', $id)
		->whereNull('pykmbh_pns_fungsional.startdate')
		->orderBy('pykmbh_pns_fungsional.created_at', 'desc')
		->first();

		$instansikerja = DB::table('pykmbh_instansi_kerja')
		->select('pykmbh_instansi.nama', 'pykmbh_instansi_kerja.startdate', 'pykmbh_instansi_kerja.created_at')
		->join('pykmbh_instansi', 'pykmbh_instansi.id', '=', 'pykmbh_instansi_kerja.instansiid')
		->where('pykmbh_instansi_kerja.pnsid', '=', $id)
		->orderBy('pykmbh_instansi_kerja.created_at', 'desc')
		->first();

		$instansiinduk = DB::table('pykmbh_instansi_induk')
		->select('pykmbh_instansi.nama', 'pykmbh_instansi_induk.startdate', 'pykmbh_instansi_induk.created_at')
		->join('pykmbh_instansi', 'pykmbh_instansi.id', '=', 'pykmbh_instansi_induk.instansiid')
		->where('pykmbh_instansi_induk.pnsid', '=', $id)
		->orderBy('pykmbh_instansi_induk.created_at', 'desc')
		->first();


		return Response::json(array(
			'pns' => $pns,
			'pendidikan' => $pendidikan,
			'diklat' => $diklat,
			'pangkat' => $pangkat,
			'struktural' => $struktural,
			'fungsional' => $fungsional,
			'instansiinduk' => $instansiinduk,
			'instansikerja' => $instansikerja
			));
	}

	public function pns2($id)
	{
		# code...
	}

	

}
