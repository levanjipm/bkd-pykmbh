<?php

class ExportLaporanController extends \PykmbhBaseController {

	public function jender()
	{
		$query = "SELECT S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk
				 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
				 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk 
				 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
				 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_pddk_jk
				 WHERE v_pns_skpd_pddk_jk.skpdId = S.id) AS 'ALL'
				FROM pykmbh_skpd S
				ORDER BY S.id";

		$jender = DB::select(DB::raw($query));

		Excel::create("report", function($excel) use ($jender)
		{
			$excel->sheet("report", function($sheet) use ($jender)
			{
				$title = "REKAPITULASI JUMLAH PNS BERDASARKAN JENDER";
				$sheet->loadView('export.jender')->with('jender', $jender)->with('title', $title);
			});
		})->download('xls');
	}

	public function diklat()
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN DIKLAT STRUKTURAL";
		$query = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
				 AND (v_pns_skpd_diklat_jk.diklatId = 1 OR v_pns_skpd_diklat_jk.diklatId=2 OR v_pns_skpd_diklat_jk.diklatId=3)) AS 'ADUMSEPADAPIMIV',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk.diklatId = 4 OR v_pns_skpd_diklat_jk.diklatId=5)) AS 'ADUMLASEPALA',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk.diklatId = 6 OR v_pns_skpd_diklat_jk.diklatId=7 OR v_pns_skpd_diklat_jk.diklatId=8)) AS 'SPAMASEPADYAPIMIII',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND (v_pns_skpd_diklat_jk.diklatId = 9 OR v_pns_skpd_diklat_jk.diklatId=10)) AS 'SPAMENPIMII',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		        AND v_pns_skpd_diklat_jk.diklatId IS NOT null) AS 'JML'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$diklat = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.diklat')->with('diklat', $diklat);
	}

	public function diklatJender()
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN DIKLAT STRUKTURAL PER JENDER";
		$query = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.jenisKelamin = 1
				 AND (v_pns_skpd_diklat_jk.diklatId = 1 OR v_pns_skpd_diklat_jk.diklatId=2 OR v_pns_skpd_diklat_jk.diklatId=3)) AS 'ADUMSEPADAPIMIV_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.jenisKelamin = 2
				 AND (v_pns_skpd_diklat_jk.diklatId = 1 OR v_pns_skpd_diklat_jk.diklatId=2 OR v_pns_skpd_diklat_jk.diklatId=3)) AS 'ADUMSEPADAPIMIV_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.jenisKelamin = 1
				 AND (v_pns_skpd_diklat_jk.diklatId = 4 OR v_pns_skpd_diklat_jk.diklatId=5)) AS 'ADUMLASEPALA_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.jenisKelamin = 2
				 AND (v_pns_skpd_diklat_jk.diklatId = 4 OR v_pns_skpd_diklat_jk.diklatId=5)) AS 'ADUMLASEPALA_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.jenisKelamin = 1
				 AND (v_pns_skpd_diklat_jk.diklatId = 6 OR v_pns_skpd_diklat_jk.diklatId=7 OR v_pns_skpd_diklat_jk.diklatId=8)) AS 'SPAMASEPADYAPIMIII_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.jenisKelamin = 2
				 AND (v_pns_skpd_diklat_jk.diklatId = 6 OR v_pns_skpd_diklat_jk.diklatId=7 OR v_pns_skpd_diklat_jk.diklatId=8)) AS 'SPAMASEPADYAPIMIII_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.jenisKelamin = 1
				 AND (v_pns_skpd_diklat_jk.diklatId = 9 OR v_pns_skpd_diklat_jk.diklatId=10)) AS 'SPAMENPIMII_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.jenisKelamin = 2
				 AND (v_pns_skpd_diklat_jk.diklatId = 9 OR v_pns_skpd_diklat_jk.diklatId=10)) AS 'SPAMENPIMII_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		        AND v_pns_skpd_diklat_jk.diklatId IS NOT null) AS 'JML'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$diklat = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.diklatJender')->with('diklat', $diklat);
	}

	public function golongan()
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN GOLONGAN PER UNIT KERJA";
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 1) AS 'a1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.pangkatId = 2) AS 'b1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.pangkatId = 3) AS 'c1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 4) AS 'd1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND (v_pns_skpd_gol_jk.pangkatId = 1 OR v_pns_skpd_gol_jk.pangkatId = 2 OR v_pns_skpd_gol_jk.pangkatId = 3 OR v_pns_skpd_gol_jk.pangkatId = 4)) AS 'JML_1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 5) AS 'a2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 6) AS 'b2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id

					 AND v_pns_skpd_gol_jk.pangkatId = 7) AS 'c2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 8) AS 'd2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND (v_pns_skpd_gol_jk.pangkatId = 5 OR v_pns_skpd_gol_jk.pangkatId = 6 OR v_pns_skpd_gol_jk.pangkatId = 7 OR v_pns_skpd_gol_jk.pangkatId = 8)) AS 'JML_2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 9) AS 'a3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 10) AS 'b3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 11) AS 'c3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 12) AS 'd3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND (v_pns_skpd_gol_jk.pangkatId = 9 OR v_pns_skpd_gol_jk.pangkatId = 10 OR v_pns_skpd_gol_jk.pangkatId = 11 OR v_pns_skpd_gol_jk.pangkatId = 12)) AS 'JML_3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 13) AS 'a4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 14) AS 'b4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 15) AS 'c4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 16) AS 'd4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND v_pns_skpd_gol_jk.pangkatId = 17) AS 'e4',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND (v_pns_skpd_gol_jk.pangkatId = 13 OR v_pns_skpd_gol_jk.pangkatId = 14 OR v_pns_skpd_gol_jk.pangkatId = 15 OR v_pns_skpd_gol_jk.pangkatId = 16 OR v_pns_skpd_gol_jk.pangkatId = 17)) AS 'JML_4'
			FROM pykmbh_skpd S
			ORDER BY S.id";
	
		$golongan = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.golongan')->with('golongan', $golongan);
	}

	public function golonganJender()
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN GOLONGAN RUANG DAN JENDER";
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 1) AS 'a1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
			         AND v_pns_skpd_gol_jk.pangkatId = 2) AS 'b1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
			         AND v_pns_skpd_gol_jk.pangkatId = 3) AS 'c1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 4) AS 'd1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 1) AS 'a1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
			         AND v_pns_skpd_gol_jk.pangkatId = 2) AS 'b1_PR',
					(SELECT COUNT(*)


					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
			         AND v_pns_skpd_gol_jk.pangkatId = 3) AS 'c1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 4) AS 'd1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND (v_pns_skpd_gol_jk.pangkatId = 1 OR v_pns_skpd_gol_jk.pangkatId = 2 OR v_pns_skpd_gol_jk.pangkatId = 3 OR v_pns_skpd_gol_jk.pangkatId = 4)) AS 'JML_1',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 5) AS 'a2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 6) AS 'b2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 7) AS 'c2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 8) AS 'd2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 5) AS 'a2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 6) AS 'b2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 7) AS 'c2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 8) AS 'd2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND (v_pns_skpd_gol_jk.pangkatId = 5 OR v_pns_skpd_gol_jk.pangkatId = 6 OR v_pns_skpd_gol_jk.pangkatId = 7 OR v_pns_skpd_gol_jk.pangkatId = 8)) AS 'JML_2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 9) AS 'a3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 10) AS 'b3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 11) AS 'c3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 12) AS 'd3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 9) AS 'a3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 10) AS 'b3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 11) AS 'c3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 12) AS 'd3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND (v_pns_skpd_gol_jk.pangkatId = 9 OR v_pns_skpd_gol_jk.pangkatId = 10 OR v_pns_skpd_gol_jk.pangkatId = 11 OR v_pns_skpd_gol_jk.pangkatId = 12)) AS 'JML_3',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 13) AS 'a4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 14) AS 'b4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 15) AS 'c4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 16) AS 'd4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 1
					 AND v_pns_skpd_gol_jk.pangkatId = 17) AS 'e4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 13) AS 'a4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 14) AS 'b4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 15) AS 'c4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 16) AS 'd4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id

			         AND v_pns_skpd_gol_jk.jenisKelamin = 2
					 AND v_pns_skpd_gol_jk.pangkatId = 17) AS 'e4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_gol_jk
					 WHERE v_pns_skpd_gol_jk.skpdId = S.id
					 AND (v_pns_skpd_gol_jk.pangkatId = 13 OR v_pns_skpd_gol_jk.pangkatId = 14 OR v_pns_skpd_gol_jk.pangkatId = 15 OR v_pns_skpd_gol_jk.pangkatId = 16 OR v_pns_skpd_gol_jk.pangkatId = 17)) AS 'JML_4'
			FROM pykmbh_skpd S
			ORDER BY S.id";
	
		$golongan = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.golonganJender')->with('golongan', $golongan);
	}

	public function pendidikan()
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN PENDIDIKAN PER UNIT KERJA";
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 1) AS 'SD_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 2) AS 'SMP_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 3) AS 'SMA_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 4) AS 'D1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 5) AS 'D2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 6) AS 'D3_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 7) AS 'D4_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 8) AS 'S1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 9) AS 'S2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 10) AS 'S3_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 11) AS 'DLL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
			         AND v_pns_skpd_pddk_jk.pendidikanId IS NOT NULL) AS 'ALL'
			FROM pykmbh_skpd S
			ORDER BY S.id";

		$query2 = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 1) AS 'SD_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 2) AS 'SMP_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 3) AS 'SMA_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 4) AS 'D1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 5) AS 'D2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 6) AS 'D3_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 7) AS 'D4_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 8) AS 'S1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 9) AS 'S2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 10) AS 'S3_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
			         AND v_pns_skpd_pddk_jk.pendidikanId IS NOT NULL) AS 'ALL'
			FROM pykmbh_skpd S
			ORDER BY S.id";

		$pendidikan = DB::select(DB::raw($query));
		$pendidikan2 = DB::select(DB::raw($query2));

		$this->layout->content = View::make('laporan.pendidikan')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2);
	}

	public function pendidikanJender()
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN PENDIDIKAN PER JENDER";
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 1
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'SD_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 1
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'SD_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 1) AS 'SD_ALL',
					 (SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 2
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'SMP_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 2
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'SMP_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 2) AS 'SMP_ALL',
			(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 3
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'SMA_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 3
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'SMA_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 3) AS 'SMA_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 4
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'D1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 4
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'D1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 4) AS 'D1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 5
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'D2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 5
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'D2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 5) AS 'D2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 6
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'D3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 6
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'D3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 6) AS 'D3_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 7
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'D4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 7
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'D4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 7) AS 'D4_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 8
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'S1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 8
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'S1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 8) AS 'S1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 9
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'S2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 9
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'S2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 9) AS 'S2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 10
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'S3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 10
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'S3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 10) AS 'S3_ALL',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 11
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'DLL_LK',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 11
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'DLL_PR',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 11) AS 'DLL_ALL',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
			         AND v_pns_skpd_pddk_jk.pendidikanId is NOT NULL) AS 'ALL'
			FROM pykmbh_skpd S
			ORDER BY S.id";


			$query2 = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 1
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'SD_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 1
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'SD_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 1) AS 'SD_ALL',
					 (SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 2
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'SMP_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 2
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'SMP_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 2) AS 'SMP_ALL',
			(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 3
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'SMA_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 3
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'SMA_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 3) AS 'SMA_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 4
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'D1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 4
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'D1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 4) AS 'D1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 5
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'D2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 5
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'D2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 5) AS 'D2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 6
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'D3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 6
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'D3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 6) AS 'D3_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 7
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'D4_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 7
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'D4_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 7) AS 'D4_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 8
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'S1_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 8
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'S1_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 8) AS 'S1_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 9
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'S2_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 9
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'S2_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 9) AS 'S2_ALL',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 10
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 1) AS 'S3_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 10
					 AND v_pns_skpd_pddk_jk.jenisKelamin = 2) AS 'S3_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
					 AND v_pns_skpd_pddk_jk.pendidikanId = 10) AS 'S3_ALL',		
					(SELECT COUNT(*)
					 FROM v_pns_skpd_pddk_jk 
					 WHERE v_pns_skpd_pddk_jk.skpdId = S.id
			         AND v_pns_skpd_pddk_jk.pendidikanId is NOT NULL) AS 'ALL'
			FROM pykmbh_skpd S
			ORDER BY S.id";

		$pendidikan = DB::select(DB::raw($query));
		$pendidikan2 = DB::select(DB::raw($query2));

		$this->layout->content = View::make('laporan.pendidikanJender')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2);
	}

	public function eselon()
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN ESELON";
		$query = "SELECT 	S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
					 AND pykmbh_eselon.id = 1) AS 'Ia',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
					 AND pykmbh_eselon.id = 2) AS 'Ib',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT NULL
					 AND (pykmbh_eselon.id = 1 OR pykmbh_eselon.id = 2)) AS 'I_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			         AND pykmbh_eselon.id = 3) AS 'IIa',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
					 AND pykmbh_eselon.id = 4) AS 'IIb',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT NULL
					 AND (pykmbh_eselon.id = 3 OR pykmbh_eselon.id = 4)) AS 'II_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
					 AND pykmbh_eselon.id = 5) AS 'IIIa',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			         AND pykmbh_eselon.id = 6) AS 'IIIb',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT NULL
					 AND (pykmbh_eselon.id = 5 OR pykmbh_eselon.id = 6)) AS 'III_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			         AND pykmbh_eselon.id = 7) AS 'IVa',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			    	 AND pykmbh_eselon.id = 8) AS 'IVb',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT NULL
					 AND (pykmbh_eselon.id = 7 OR pykmbh_eselon.id = 8)) AS 'IV_JML',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			         AND pykmbh_eselon.id = 9) AS 'Va',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT NULL) AS 'JML'
			FROM pykmbh_skpd S
			ORDER BY S.id";

		$eselon = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.eselon')->with('eselon', $eselon);
	}

	public function eselonJender()
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN ESELON PER JENDER";
		$query = "SELECT 	S.nama,
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 1) AS 'Ia_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 1) AS 'Ia_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 2) AS 'Ib_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 2) AS 'Ib_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 1 OR pykmbh_eselon.id = 2)) AS 'I_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 3) AS 'IIa_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 3) AS 'IIa_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 4) AS 'IIb_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 4) AS 'IIb_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 3 OR pykmbh_eselon.id = 4)) AS 'II_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 5) AS 'IIIa_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 5) AS 'IIIa_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 6) AS 'IIIb_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 6) AS 'IIIb_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 5 OR pykmbh_eselon.id = 6)) AS 'III_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 7) AS 'IVa_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 7) AS 'IVa_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 8) AS 'IVb_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 8) AS 'IVb_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 7 OR pykmbh_eselon.id = 8)) AS 'IV_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 1
				 AND pykmbh_eselon.id = 9) AS 'Va_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.jenisKelamin = 2
				 AND pykmbh_eselon.id = 9) AS 'Va_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT NULL
				 AND (pykmbh_eselon.id = 9)) AS 'V_JML',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_eselon_jk JOIN pykmbh_eselon ON v_pns_skpd_eselon_jk.jabatan = pykmbh_eselon.id
				 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
		         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT NULL) AS 'TOTAL'
		FROM pykmbh_skpd S
		ORDER BY S.id";

		$eselon = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.eselonJender')->with('eselon', $eselon);
	}



}
