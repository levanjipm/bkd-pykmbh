<?php

class KGBController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*$kgb = DB::table('pykmbh_kgb');
		->select()
		->get();*/
		$kgb = DB::table('pykmbh_kgb')
				->select('pykmbh_kgb.id','pykmbh_pns.nama','pykmbh_pns.NIPBaru', 'pykmbh_kgb.tanggal', 'pykmbh_kgb.aktif',DB::raw('abs(timestampdiff(month,pykmbh_kgb.tanggal, CURDATE())) as diff'))
				->leftJoin('pykmbh_pns', 'pykmbh_pns.id', '=', 'pykmbh_kgb.pnsID')
				// ->where('pykmbh_kgb.aktif', '=', 1)
				->orderBy('pykmbh_pns.NIPBaru', 'asc')
				->get();
		// dd($kgb);//tampilkan variabel kgb

		return View::make('kgb.index')->with('kgb', $kgb);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$kgb = PNS::orderBy('nama', 'asc')
		->lists('nama', 'id');
		return View::make('kgb.create')->with('pns', $kgb);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'pnsId'			=> 'required',
			'tanggal'		=> 'required|date',
			); 

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('kgb/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$kgbOld = KGB::where('pnsId','=',Input::get('pnsId'))
							->where('aktif','=',1)
							->update(array('aktif'=> 0));

			$kgb = new KGB;
			$kgb->pnsId = Input::get('pnsId');
			$kgb->tanggal = Input::get('tanggal');
			
			if ($kgb->save()) 
				return Redirect::to('kgb')->with('message', 'Data KGB telah ditambahkan')->with('type', 1);
			
			else
				return Redirect::to('kgb/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kgb = KGB::findOrFail($id);
		$pns = PNS::orderBy('nama', 'asc')
		->lists('nama', 'id');
		return View::make('kgb.edit')->with('pns', $pns)->with('kgb', $kgb);
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
			'pnsId'			=> 'required',
			'tanggal'		=> 'required|date',
			); 

		$validation = Validator::make(Input::all(),$rules);

		if ($validation->fails())
		{
			return Redirect::to('kgb/create')->with('message', errorMsg(json_decode($validation->messages(), true)))->with('type', 2)->withInput();
		}
		else
		{
			$kgb = KGB::findOrFail($id);
			$kgb->pnsId = Input::get('pnsId');
			$kgb->tanggal = Input::get('tanggal');
			
			if ($kgb->save()) 
				return Redirect::to('kgb')->with('message', 'Data KGB telah diupdate')->with('type', 1);
			
			else
				return Redirect::to('kgb/create')->with('message', 'Kesalahan pada server')->with('type', 2)->withInput();
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
		$kgb = KGB::findOrFail($id);
		$kgb->delete();
		return Redirect::to('kgb')->with('message', 'Data KGB telah dihapus')->with('type', 1);
	}

	public function hitung_kgb() {
		$skpd = SKPD::orderBy('nama', 'ASC')->lists('nama', 'id');
		$now = \Carbon\Carbon::today()->format('Y-m-d');
		if(Request::ajax()) {
			$rules = array(
					'skpd_id' => 'required',
					'tanggal' => 'required'
				);
			$validation = Validator::make(Input::all(), $rules);
			if ($validation->fails()) {
				return Response::json(array('status' => false, 'message' => 'Data anda tidak lengkap'));
			} else {
				$skpd_id = Input::get('skpd_id');
				$tanggal = Input::get('tanggal') . ' 00:00:00';
				if ($skpd_id == 'all') {
					$kgb = DB::table('pykmbh_kgb')
					->select('pykmbh_kgb.id','pykmbh_pns.nama','pykmbh_pns.NIPBaru', 'pykmbh_kgb.tanggal', 'pykmbh_pangkat.golongan', 'pykmbh_skpd.nama as skpd_nama', 'pykmbh_skpd.id as skpd_id')
					->leftJoin('pykmbh_pns', 'pykmbh_pns.id', '=', 'pykmbh_kgb.pnsID')
					->leftJoin('pykmbh_pns_skpd', 'pykmbh_pns.id', '=', 'pykmbh_pns_skpd.pnsId')
					->leftJoin('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdId')
					->leftJoin('pykmbh_pns_pangkat', 'pykmbh_pns.id', '=', 'pykmbh_pns_pangkat.pnsId')
					->leftJoin('pykmbh_pangkat', 'pykmbh_pangkat.id', '=', 'pykmbh_pns_pangkat.pangkatId')
					->where('pykmbh_kgb.aktif', '=', 1)
					->whereRaw('abs(timestampdiff(month,tanggal, "'.$tanggal.'")) >= 24')
					->orderBy('pykmbh_pns.NIPBaru', 'asc')
					->get();
				} else {
					$kgb = DB::table('pykmbh_kgb')
					->select('pykmbh_kgb.id','pykmbh_pns.nama','pykmbh_pns.NIPBaru', 'pykmbh_kgb.tanggal', 'pykmbh_pangkat.golongan', 'pykmbh_skpd.nama as skpd_nama', 'pykmbh_skpd.id as skpd_id')
					->leftJoin('pykmbh_pns', 'pykmbh_pns.id', '=', 'pykmbh_kgb.pnsID')
					->leftJoin('pykmbh_pns_skpd', 'pykmbh_pns.id', '=', 'pykmbh_pns_skpd.pnsId')
					->leftJoin('pykmbh_skpd', 'pykmbh_skpd.id', '=', 'pykmbh_pns_skpd.skpdId')
					->leftJoin('pykmbh_pns_pangkat', 'pykmbh_pns.id', '=', 'pykmbh_pns_pangkat.pnsId')
					->leftJoin('pykmbh_pangkat', 'pykmbh_pangkat.id', '=', 'pykmbh_pns_pangkat.pangkatId')
					->where('pykmbh_kgb.aktif', '=', 1)
					->whereRaw('abs(timestampdiff(month,tanggal, \''.$tanggal.'\')) >= 24')
					->where('pykmbh_pns_skpd.skpdId', '=', $skpd_id)
					->orderBy('pykmbh_pns.NIPBaru', 'asc')
					->get();
				}
				
				

				return Response::json(array('status' => true, 'data' => $kgb));
			}
		}
		
		return View::make('kgb.hitung_kgb')->with('skpd', $skpd)->with('now', $now);
	}
}
