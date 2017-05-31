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

	public function show($skpdid)
	{
		$skpd = SKPD::all();

		if ($skpdid) 
		{
			$struktur = [];

			$jabatan = DB::table('pykmbh_skpd_jabatan')
			->select('pykmbh_skpd_jabatan.id as jabSkpdid', 'pykmbh_pns_pangkat.startdate as pangkatTMT', 'pykmbh_pangkat.golongan', 'pykmbh_pns_struktural.startdate as jabTMT', 'pykmbh_jab_struktural.id', 'pykmbh_jab_struktural.nama as jabatan', 'pykmbh_jab_struktural.indukid', 'pykmbh_pns.nama as pns', 'pykmbh_pns.nipbaru as nip')
			->join('pykmbh_jab_struktural', 'pykmbh_skpd_jabatan.jabatanid', '=', 'pykmbh_jab_struktural.id')
			->leftjoin('pykmbh_pns_struktural', function($join)
			{
				$join->on('pykmbh_skpd_jabatan.id', '=', 'pykmbh_pns_struktural.skpdstrukturalid');
			})
			->whereNull('pykmbh_pns_struktural.enddate')

			// ->leftjoin('pykmbh_pns_skpd', function ($join)
			// {
			// 	$join->on('pykmbh_pns_skpd.id', '=', 'pykmbh_pns_struktural.pnsSkpdid');			
			// })
			// ->whereNull('pykmbh_pns_skpd.enddate')
			->leftjoin('pykmbh_pns', 'pykmbh_pns.id', '=', 'pykmbh_pns_struktural.pnsid')
			->leftjoin('pykmbh_pns_pangkat', function ($join)
			{
				$join->on('pykmbh_pns_pangkat.pnsid', '=', 'pykmbh_pns.id');			
			})
			->whereNull('pykmbh_pns_pangkat.enddate')
			->leftjoin('pykmbh_pangkat', 'pykmbh_pangkat.id', '=', 'pykmbh_pns_pangkat.pangkatid')
			->where('pykmbh_skpd_jabatan.skpdid', $skpdid)
			// ->where('pykmbh_pns_struktural.aktif', 1)
			// ->where('pykmbh_pns_skpd.aktif', 1)
			->get();

			foreach ($jabatan as $key => $value) 
			{
				$parent = $value->indukid==0?'':"$value->indukid";

				$pejabat = ($value->pns==''||$value->pns==null)?' - ':$value->pns;
				$nip = ($value->nip==''||$value->nip==null)?' - ':$value->nip;
				$jabTMT = ($value->jabTMT==''||$value->jabTMT==null)?' - ':$value->jabTMT;
				$gol = ($value->golongan==''||$value->golongan==null)?' - ':$value->golongan." <strong>/</strong> ".$value->pangkatTMT;

				$isi = "<table width='100%' border='1'><tbody><tr><td colspan='3'>".$value->jabatan."</td></tr><tr><td width='50%'>Nama</td><td>".$pejabat."</td></tr>";
				$isi = $isi."<tr><td width='50%'>NIP</td><td>".$nip."</td></tr><tr><td width='50%'>Gol. / TMT</td><td>".$gol."</td></tr>";
				$isi = $isi."<tr><td width='50%'>TMT Jab.</td><td>".$jabTMT."</td></tr></tbody></table>"; 
				$isi = $isi."<br><button class='pull-right' onclick='ganti(".$value->jabSkpdid.")'>Edit</button>";

				$id = array('v' => "$value->id", "f" => $isi);

				$struktur[] = array(
					$id, 
					$parent,
					'Test'
					);
			}

		}
		else
			return Redirect::to('struktur-organisasi');

		foreach ($struktur as $key => $value) 
		{
			$temp = $value[1];
			$found = false;

			foreach ($struktur as $key2 => $value2) 
			{
				if ($temp == $value2[0]['v']) 
				{
					$found = !$found;
					// return $value2[1];
				}
			}

			if (!$found) 
				$struktur[$key][1] = null;
		}

		// return ($struktur);
		// return $id;

		$this->layout->content = View::make('struktur.index')->with('struktur', $struktur)->with('skpd', $skpd)->with('select', $skpdid);
	}

	public function updatePejabat($id)
	{
		$current = DB::table('pykmbh_skpd_jabatan')
		->select('pnsid')
		->join('pykmbh_pns_struktural', 'pykmbh_pns_struktural.skpdstrukturalid','=', 'pykmbh_skpd_jabatan.id')
		->where('id', $id)->lists('pnsid');

		// $pns = DB::table('pykmbh_pns_skpd')
		// ->select('pykmbh_pns_skpd.id', 'pykmbh_pns.nama', 'pykmbh_pns.nipbaru')
		// ->join('pykmbh_pns', 'pykmbh_pns_skpd.pnsid', '=', 'pykmbh_pns.id')
		// ->where('pykmbh_pns_skpd.skpdid', $skpd->skpdid)
		// ->get();

		$pns = DB::table('pykmbh_pns')
		->select('nama', 'nipbaru', 'id')
		->whereNotIn('id', $current)
		->orderBy('nama', 'asc')
		->get();

		return View::make('ajax.updatePejabat')->with('pns', $pns)->with('id', $id);
	}

	public function editPejabat($id)
	{
		$skpd = DB::table('pykmbh_skpd_jabatan')
		->select('skpdid')
		->where('id', $id)->first();

		//cek apakah pns sudah ada dalam skpd
		$skpdpns = DB::table('pykmbh_pns_skpd')
		->select('id')
		->where('pnsid', Input::get('pns'))
		->where('skpdid', $skpd->skpdid)
		->lists('id');

		//daftarkan pns ke skpd jika belum ada
		if (sizeof($skpdpns) < 1) 
			$idskpdpns = DB::table('pykmbh_pns_skpd')->insertGetid(array('pnsid' => Input::get('pns'), 'skpdid' => $skpd->skpdid, 'aktif' => 1, 'TMT' => Input::get('tmt')));

		//nonaktifkan pejabat sebelumnya
		DB::table('pykmbh_pns_struktural')->where('skpdstrukturalid', $id)->update(array('aktif' => 0));

		//daftarkan pejabat baru
		if (sizeof($skpdpns) > 0) 
			$idskpdpns = $skpdpns[0];
		
		DB::table('pykmbh_pns_struktural')->insert(array('pnsSkpdid' => $idskpdpns, 'TMT' => Input::get('tmt'), 'aktif' => 1, 'skpdstrukturalid' => $id));

		return Redirect::to('struktur-organisasi/'.$skpd->skpdid);
	}

}
