<?php

class LaporanEController extends \PykmbhBaseController {

	public function jender()
	{
		$query = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id) AS 'ALL'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$jender = DB::select(DB::raw($query));
		$this->layout->content = View::make('laporan.jender')->with('jender', $jender);
	}

	public function diklat()
	{
		$query = "";

		$diklat = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.diklat')->with('diklat', $diklat);
	}

	public function diklatJender()
	{
		$query = "";

		$diklat = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.diklatJender')->with('diklat', $diklat);
	}

	public function golongan()
	{
		$query = "";
	
		$golongan = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.golongan')->with('golongan', $golongan);
	}

	public function golonganJender()
	{
		$query = "";
	
		$golongan = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.golonganJender')->with('golongan', $golongan);
	}

	public function pendidikan()
	{
		$query = "";

		$query2 = "";

		$pendidikan = DB::select(DB::raw($query));
		$pendidikan2 = DB::select(DB::raw($query2));

		$this->layout->content = View::make('laporan.pendidikan')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2);
	}

	public function pendidikanJender()
	{
		$query = "";


		$query2 = "";

		$pendidikan = DB::select(DB::raw($query));
		$pendidikan2 = DB::select(DB::raw($query2));

		$this->layout->content = View::make('laporan.pendidikanJender')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2);
	}

	public function eselon()
	{
		$query = "";

		return $eselon = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.eselon')->with('eselon', $eselon);
	}

	public function eselonJender()
	{
		$query = "";

		$eselon = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.eselonJender')->with('eselon', $eselon);
	}


}
