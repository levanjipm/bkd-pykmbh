<?php

class ExportLaporanEslJFUController extends \PykmbhBaseController {

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
		$query = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 1 OR v_pns_skpd_diklat_jk_esljfu.diklatId=2 OR v_pns_skpd_diklat_jk_esljfu.diklatId=3)) AS 'ADUMSEPADAPIMIV',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 4 OR v_pns_skpd_diklat_jk_esljfu.diklatId=5)) AS 'ADUMLASEPALA',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 6 OR v_pns_skpd_diklat_jk_esljfu.diklatId=7 OR v_pns_skpd_diklat_jk_esljfu.diklatId=8)) AS 'SPAMASEPADYAPIMIII',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 9 OR v_pns_skpd_diklat_jk_esljfu.diklatId=10)) AS 'SPAMENPIMII',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		        AND v_pns_skpd_diklat_jk_esljfu.diklatId IS NOT null) AS 'JML'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$diklat = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.diklat')->with('diklat', $diklat);
	}

	public function diklatJender()
	{
		$query = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 1)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'ADUM_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 1)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'ADUM_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 2)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'SEPADA_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 2)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'SEPADA_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 3)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'PIM_IV_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 3)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'PIM_IV_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 1 OR v_pns_skpd_diklat_jk_esljfu.diklatId=2 OR  
		v_pns_skpd_diklat_jk_esljfu.diklatId=3)) AS 'ADUMSEPADAPIM_IV',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 4)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'ADUMLA_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 4)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'ADUMLA_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 5)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'SEPALA_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 5)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'SEPALA_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 4 OR v_pns_skpd_diklat_jk_esljfu.diklatId=5)) AS 'ADUMLASEPALA',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 6)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'SPAMA_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 6)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'SPAMA_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 7)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'SEPADAYA_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 7)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'SEPADYA_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 8)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'PIM_III_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 8)
				AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'PIM_III_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 6 OR v_pns_skpd_diklat_jk_esljfu.diklatId=7 OR v_pns_skpd_diklat_jk_esljfu.diklatId=8)) AS  
		'SPAMASEPADYAPIMIII',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 9)
		        AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'SPAMEN_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 9)
		        AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'SPAMEN_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 10)
		        AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 1) AS 'PIM_II_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 10)
		        AND v_pns_skpd_diklat_jk_esljfu.jenisKelamin = 2) AS 'PIM_II_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk_esljfu.diklatId = 9 OR v_pns_skpd_diklat_jk_esljfu.diklatId=10)) AS 'SPAMENPIMII',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk_esljfu
				 WHERE v_pns_skpd_diklat_jk_esljfu.skpdId = S.id
		        AND v_pns_skpd_diklat_jk_esljfu.diklatId IS NOT null) AS 'JML'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$diklat = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporanEselon.diklatJender')->with('diklat', $diklat);
	}

	public function golongan()
	{
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 1) AS 'a1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.pangkatId = 2) AS 'b1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.pangkatId = 3) AS 'c1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 4) AS 'd1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND (v_pns_skpd_gol_jk_esljfu.pangkatId = 1 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 2 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 3 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 4)) AS 'JML_1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 5) AS 'a2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 6) AS 'b2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 7) AS 'c2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 8) AS 'd2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND (v_pns_skpd_gol_jk_esljfu.pangkatId = 5 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 6 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 7 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 8)) AS 'JML_2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 9) AS 'a3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 10) AS 'b3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 11) AS 'c3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 12) AS 'd3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND (v_pns_skpd_gol_jk_esljfu.pangkatId = 9 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 10 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 11 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 12)) AS 'JML_3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 13) AS 'a4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 14) AS 'b4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 15) AS 'c4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 16) AS 'd4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 17) AS 'e4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND (v_pns_skpd_gol_jk_esljfu.pangkatId = 13 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 14 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 15 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 16 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 17)) AS 'JML_4'
			FROM pykmbh_skpd S
			ORDER BY S.id";
	
		$golongan = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.golongan')->with('golongan', $golongan);
	}

	public function golonganJender()
	{
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 1) AS 'a1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
			         AND v_pns_skpd_gol_jk_esljfu.pangkatId = 2) AS 'b1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
			         AND v_pns_skpd_gol_jk_esljfu.pangkatId = 3) AS 'c1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 4) AS 'd1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 1) AS 'a1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
			         AND v_pns_skpd_gol_jk_esljfu.pangkatId = 2) AS 'b1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
			         AND v_pns_skpd_gol_jk_esljfu.pangkatId = 3) AS 'c1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 4) AS 'd1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND (v_pns_skpd_gol_jk_esljfu.pangkatId = 1 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 2 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 3 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 4)) AS 'JML_1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 5) AS 'a2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 6) AS 'b2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 7) AS 'c2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 8) AS 'd2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 5) AS 'a2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 6) AS 'b2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 7) AS 'c2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 8) AS 'd2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND (v_pns_skpd_gol_jk_esljfu.pangkatId = 5 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 6 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 7 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 8)) AS 'JML_2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 9) AS 'a3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 10) AS 'b3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 11) AS 'c3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 12) AS 'd3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 9) AS 'a3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 10) AS 'b3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 11) AS 'c3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 12) AS 'd3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND (v_pns_skpd_gol_jk_esljfu.pangkatId = 9 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 10 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 11 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 12)) AS 'JML_3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 13) AS 'a4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 14) AS 'b4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 15) AS 'c4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 16) AS 'd4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 17) AS 'e4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 13) AS 'a4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 14) AS 'b4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 15) AS 'c4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 16) AS 'd4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_gol_jk_esljfu.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk_esljfu.pangkatId = 17) AS 'e4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk_esljfu
					 WHERE v_pns_skpd_gol_jk_esljfu.skpdId = S.id
					 AND (v_pns_skpd_gol_jk_esljfu.pangkatId = 13 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 14 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 15 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 16 OR v_pns_skpd_gol_jk_esljfu.pangkatId = 17)) AS 'JML_4'
			FROM pykmbh_skpd S
			ORDER BY S.id";
	
		$golongan = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.golonganJender')->with('golongan', $golongan);
	}

	public function pendidikan()
	{
		$query = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 1) AS 'SD_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 2) AS 'SMP_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 3) AS 'SMA_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 4) AS 'D1_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 5) AS 'D2_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 6) AS 'D3_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 7) AS 'D4_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 8) AS 'S1_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 9) AS 'S2_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 10) AS 'S3_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 11) AS 'DLL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_pddk_jk_esljfu.pendidikanId IS NOT NULL) AS 'ALL'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$query2 = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 1) AS 'SD_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 2) AS 'SMP_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 3) AS 'SMA_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 4) AS 'D1_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 5) AS 'D2_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 6) AS 'D3_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 7) AS 'D4_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 8) AS 'S1_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 9) AS 'S2_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 10) AS 'S3_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_pddk_jk_esljfu.pendidikanId IS NOT NULL) AS 'ALL'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$pendidikan = DB::select(DB::raw($query));
		$pendidikan2 = DB::select(DB::raw($query2));

		$this->layout->content = View::make('laporan.pendidikan')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2);
	}

	public function pendidikanJender()
	{
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 1
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'SD_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 1
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'SD_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 1) AS 'SD_ALL',
					 (SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 2
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'SMP_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 2
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'SMP_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 2) AS 'SMP_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 3
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'SMA_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 3
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'SMA_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 3) AS 'SMA_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 4
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'D1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 4
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'D1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 4) AS 'D1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 5
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'D2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 5
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'D2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 5) AS 'D2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 6
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'D3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 6
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'D3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 6) AS 'D3_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 7
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'D4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 7
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'D4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 

					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 7) AS 'D4_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 8
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'S1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 8
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'S1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 8) AS 'S1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 9
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'S2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 9
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'S2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 9) AS 'S2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 10
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'S3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 10
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'S3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 10) AS 'S3_ALL',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 11
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'DLL_LK',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 11
					 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'DLL_PR',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
					 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 11) AS 'DLL_ALL',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk_esljfu 
					 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_pddk_jk_esljfu.pendidikanId is NOT NULL) AS 'ALL'
			FROM pykmbh_skpd S
			ORDER BY S.id";


		$query2 ="SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 1
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'SD_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 1
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'SD_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 1) AS 'SD_ALL',
				 (SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 2
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'SMP_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 2
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'SMP_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 2) AS 'SMP_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 3
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'SMA_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 3
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'SMA_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 3) AS 'SMA_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 4
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'D1_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 4
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'D1_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 4) AS 'D1_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 5
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'D2_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 5
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'D2_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 5) AS 'D2_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 6
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'D3_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 6
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'D3_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 6) AS 'D3_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 7
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'D4_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 7
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'D4_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 

				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 7) AS 'D4_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 8
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'S1_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 8
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'S1_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 8) AS 'S1_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 9
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'S2_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 9
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'S2_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 9) AS 'S2_ALL',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 10
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'S3_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 10
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'S3_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 10) AS 'S3_ALL',		
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 11
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 1) AS 'DLL_LK',		
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 11
				 AND v_pns_skpd_pddk_jk_esljfu.jenisKelamin = 2) AS 'DLL_PR',		
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
				 AND v_pns_skpd_pddk_jk_esljfu.pendidikanId = 11) AS 'DLL_ALL',		
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk_esljfu 
				 WHERE v_pns_skpd_pddk_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_pddk_jk_esljfu.pendidikanId is NOT NULL) AS 'ALL'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$pendidikan = DB::select(DB::raw($query));
		$pendidikan2 = DB::select(DB::raw($query2));

		$this->layout->content = View::make('laporan.pendidikanJender')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2);
	}

	public function eselon()
	{
		$query = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
				 AND pykmbh_eselon.id = 1) AS 'Ia',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
				 AND pykmbh_eselon.id = 2) AS 'Ib',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 1 OR pykmbh_eselon.id = 2)) AS 'I_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
		         AND pykmbh_eselon.id = 3) AS 'IIa',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
				 AND pykmbh_eselon.id = 4) AS 'IIb',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 3 OR pykmbh_eselon.id = 4)) AS 'II_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
				 AND pykmbh_eselon.id = 5) AS 'IIIa',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
		         AND pykmbh_eselon.id = 6) AS 'IIIb',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 5 OR pykmbh_eselon.id = 6)) AS 'III_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
		         AND pykmbh_eselon.id = 7) AS 'IVa',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
		    	 AND pykmbh_eselon.id = 8) AS 'IVb',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 7 OR pykmbh_eselon.id = 8)) AS 'IV_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT null
		         AND pykmbh_eselon.id = 9) AS 'Va',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk_esljfu JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk_esljfu.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
		         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL) AS 'JML'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$eselon = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.eselon')->with('eselon', $eselon);
	}

	public function eselonJender()
	{
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 1) AS 'Ia_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 1) AS 'Ia_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 2) AS 'Ib_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 2) AS 'Ib_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
					 AND (v_pns_skpd_eselon_jk_esljfu.jabatan = 1 OR v_pns_skpd_eselon_jk_esljfu.jabatan = 2)) AS 'I_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 3) AS 'IIa_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 3) AS 'IIa_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 4) AS 'IIb_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 4) AS 'IIb_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
					 AND (v_pns_skpd_eselon_jk_esljfu.jabatan = 3 OR v_pns_skpd_eselon_jk_esljfu.jabatan = 4)) AS 'II_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 5) AS 'IIIa_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 5) AS 'IIIa_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 6) AS 'IIIb_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 6) AS 'IIIb_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
					 AND (v_pns_skpd_eselon_jk_esljfu.jabatan = 5 OR v_pns_skpd_eselon_jk_esljfu.jabatan = 6)) AS 'III_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 7) AS 'IVa_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 7) AS 'IVa_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 8) AS 'IVb_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 8) AS 'IVb_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
					 AND (v_pns_skpd_eselon_jk_esljfu.jabatan = 7 OR v_pns_skpd_eselon_jk_esljfu.jabatan = 8)) AS 'IV_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 1
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 9) AS 'Va_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin = 2
					 AND v_pns_skpd_eselon_jk_esljfu.jabatan = 9) AS 'Va_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL
					 AND (v_pns_skpd_eselon_jk_esljfu.jabatan = 9)) AS 'V_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk_esljfu 
					 WHERE v_pns_skpd_eselon_jk_esljfu.skpdId = S.id
			         AND v_pns_skpd_eselon_jk_esljfu.JenisKelamin IS NOT NULL) AS 'TOTAL'
			FROM pykmbh_skpd S
			ORDER BY S.id";

		$eselon = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.eselonJender')->with('eselon', $eselon);
	}


}
