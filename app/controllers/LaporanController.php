<?php

class LaporanController extends \PykmbhBaseController {

	private function grups()
	{
		return $grups = grup1::orderBy('indexing', 'asc')->get();
	}


	public function komposisiEselon($jenis)
	{
		$title = "REKAPITULASI JUMLAH KOMPOSISI ESELON";

		$query = "SELECT 	
				S.nama,
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
					 AND v_pns_skpd_eselon_jk.jabatan = 1) AS 'Ia_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
					 AND v_pns_skpd_eselon_jk.jabatan = 1) AS 'Ia_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
					 AND v_pns_skpd_eselon_jk.jabatan = 1) AS 'Ia_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
					 AND v_pns_skpd_eselon_jk.jabatan = 2) AS 'Ib_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
					 AND v_pns_skpd_eselon_jk.jabatan = 2) AS 'Ib_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
					 AND v_pns_skpd_eselon_jk.jabatan = 2) AS 'Ib_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.jabatan = 3) AS 'IIa_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			         AND v_pns_skpd_eselon_jk.jabatan = 3) AS 'IIa_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
			         AND v_pns_skpd_eselon_jk.jabatan = 3) AS 'IIa_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			 		 AND v_pns_skpd_eselon_jk.jabatan = 4) AS 'IIb_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
					 AND v_pns_skpd_eselon_jk.jabatan = 4) AS 'IIb_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
					 AND v_pns_skpd_eselon_jk.jabatan = 4) AS 'IIb_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
					 AND v_pns_skpd_eselon_jk.jabatan = 5) AS 'IIIa_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
					 AND v_pns_skpd_eselon_jk.jabatan = 5) AS 'IIIa_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
					 AND v_pns_skpd_eselon_jk.jabatan = 5) AS 'IIIa_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.jabatan = 6) AS 'IIIb_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			         AND v_pns_skpd_eselon_jk.jabatan = 6) AS 'IIIb_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
			         AND v_pns_skpd_eselon_jk.jabatan = 6) AS 'IIIb_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.jabatan = 7) AS 'IVa_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			         AND v_pns_skpd_eselon_jk.jabatan = 7) AS 'IVa_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
			         AND v_pns_skpd_eselon_jk.jabatan = 7) AS 'IVa_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			    	 AND v_pns_skpd_eselon_jk.jabatan = 8) AS 'IVb_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			    	 AND v_pns_skpd_eselon_jk.jabatan = 8) AS 'IVb_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
			    	 AND v_pns_skpd_eselon_jk.jabatan = 8) AS 'IVb_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.jabatan = 9) AS 'Va_TERSEDIA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS NOT null
			         AND v_pns_skpd_eselon_jk.jabatan = 9) AS 'Va_TERISI',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.pnsId IS null
			         AND v_pns_skpd_eselon_jk.jabatan = 9) AS 'Va_KOSONG',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.jenisJabatanFungsional = 'JFU') AS 'JmlFungsUmum',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
			         AND v_pns_skpd_eselon_jk.jenisJabatanFungsional = 'JFT') AS 'JmlFungsTertentu',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_eselon_jk 
					 WHERE v_pns_skpd_eselon_jk.skpdId = S.id) AS 'Total'
			FROM pykmbh_skpd S
			ORDER BY S.id";

		$komposisi = DB::select(DB::raw($query));


		if ($jenis=='rekap') 
		{
			$this->layout->content = View::make('laporan.komposisi')->with('komposisi', $komposisi)->with('title', $title);
		}
		else
		{
			Excel::create("report", function($excel) use ($jender, $title)
			{
				$excel->sheet("report", function($sheet) use ($jender, $title)
				{
					$sheet->loadView('export.komposisi')->with('komposisi', $komposisi)->with('title', $title);
				});
			})->download('xls');
		}
		// $this->layout->content = View::make('laporan.komposisi')->with('title', $title);
	}

	public function komposisiKecamatan($jenis)
	{
		$title = "REKAPITULASI JUMLAH KOMPOSISI JABATAN ESSELON ";
		$query = "SELECT 	S.jenis,
					S.id,
					S.kecInduk,
					S.nama,
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
						 AND v_pns_skpd_eselon_jk.jabatan = 1
						AND ) AS 'Ia_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
						 AND v_pns_skpd_eselon_jk.jabatan = 1) AS 'Ia_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
				         	AND v_pns_skpd_eselon_jk.JenisKelamin IS null
						 AND v_pns_skpd_eselon_jk.jabatan = 1) AS 'Ia_KOSONG',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
						 AND v_pns_skpd_eselon_jk.jabatan = 2) AS 'Ib_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
						 AND v_pns_skpd_eselon_jk.jabatan = 2) AS 'Ib_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS null
						 AND v_pns_skpd_eselon_jk.jabatan = 2) AS 'Ib_KOSONG',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.jabatan = 3) AS 'IIa_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
				         	AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
				         	AND v_pns_skpd_eselon_jk.jabatan = 3) AS 'IIa_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS null
				         	AND v_pns_skpd_eselon_jk.jabatan = 3) AS 'IIa_KOSONG',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
				 		 AND v_pns_skpd_eselon_jk.jabatan = 4) AS 'IIb_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
						 AND v_pns_skpd_eselon_jk.jabatan = 4) AS 'IIb_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS null
						 AND v_pns_skpd_eselon_jk.jabatan = 4) AS 'IIb_KOSONG',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
						 AND v_pns_skpd_eselon_jk.jabatan = 5) AS 'IIIa_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
						 AND v_pns_skpd_eselon_jk.jabatan = 5) AS 'IIIa_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
				         	AND v_pns_skpd_eselon_jk.JenisKelamin IS null
						 AND v_pns_skpd_eselon_jk.jabatan = 5) AS 'IIIa_KOSONG',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.jabatan = 6) AS 'IIIb_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
					         AND v_pns_skpd_eselon_jk.jabatan = 6) AS 'IIIb_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS null
				        	 AND v_pns_skpd_eselon_jk.jabatan = 6) AS 'IIIb_KOSONG',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.jabatan = 7) AS 'IVa_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
				        	 AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
				         	AND v_pns_skpd_eselon_jk.jabatan = 7) AS 'IVa_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS null
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
				        	 AND v_pns_skpd_eselon_jk.jabatan = 7) AS 'IVa_KOSONG',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
				    	 	AND v_pns_skpd_eselon_jk.jabatan = 8) AS 'IVb_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
				    		 AND v_pns_skpd_eselon_jk.jabatan = 8) AS 'IVb_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS null
				    	 	AND v_pns_skpd_eselon_jk.jabatan = 8) AS 'IVb_KOSONG',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
				         	AND v_pns_skpd_eselon_jk.jabatan = 9) AS 'Va_TERSEDIA',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS NOT null
				        	 AND v_pns_skpd_eselon_jk.jabatan = 9) AS 'Va_TERISI',
						(SELECT COUNT(*)
						 FROM v_pns_skpd_eselon_jk 
						 WHERE v_pns_skpd_eselon_jk.skpdId = S.id
						AND v_pns_skpd_eselon_jk.isKecamatan = 1
					         AND v_pns_skpd_eselon_jk.JenisKelamin IS null
				        	 AND v_pns_skpd_eselon_jk.jabatan = 9) AS 'Va_KOSONG'
				FROM pykmbh_skpd S
				ORDER BY S.id";

		return $komposisi = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.diklat')->with('komposisi', $komposisi)->with('title', $title);
	}

	public function jender($jenis)
	{
		$grup1 = $this->grups();

		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN JENDER";
		
		$query = "SELECT S.id,
		S.nama as 'namaSKPD',
		pykmbh_grup1.nama as 'grup1',
		pykmbh_grup1.id as 'grup1Id',
		pykmbh_grup2.nama as 'grup2',
		pykmbh_grup2.id as 'grup2Id',
		pykmbh_grup3.id as 'grup3Id',
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
		FROM pykmbh_skpd S left join pykmbh_grup1 on S.grup1 = pykmbh_grup1.id left join pykmbh_grup2 on S.grup2 = pykmbh_grup2.id 
		left join pykmbh_grup3 on S.grup3 = pykmbh_grup3.id 
		ORDER BY S.id";

		$jender = DB::select(DB::raw($query));

		//pengelompokan by grup
		foreach ($grup1 as $key => $value) 
		{
			foreach ($value->child as $key2 => $value2) 
			{
				foreach ($value2->child as $key3 => $value3) 
				{
					$temp = array();
					foreach ($jender as $index => $data) 
					{
						if ($data->grup3Id == $value3->id) 
						{
							$temp[] = $data;
							unset($jender{$index});
						}
					}
					$grup1{$key}->child{$key2}->child{$key3}->skpd = $temp;
				}

				$temp = array();
				foreach ($jender as $index => $data) 
				{
					if ($data->grup2Id == $value2->id) 
					{
						$temp[] = $data;
						unset($jender{$index});
					}
				}
				$grup1{$key}->child{$key2}->skpd = $temp;
			}

			$temp = array();
			foreach ($jender as $index => $data) 
			{
				if ($data->grup1Id == $value->id) 
				{
					$temp[] = $data;
					unset($jender{$index});
				}
			}
			$grup1{$key}->skpd = $temp;
		}

		// return $grup1;

		// foreach ($grup1 as $key => $value) 
		// {
		// 	$temp = array();
		// 	foreach ($jender as $key2 => $value2) 
		// 	{
		// 		if ($value2->grup2Id == null && $value2->grup1Id == $value->id) 
		// 		{
		// 			$temp[] = $value2;
		// 			// unset($jender{$key2});
		// 		}
		// 	}
			
		// 	$grup1{$key}->skpd = $temp;

		// 	foreach ($value->child as $key2 => $value2) 
		// 	{
		// 		$temp = array();
		// 		foreach ($jender as $key3 => $value3) 
		// 		{
		// 			if ($value3->grup2Id == $value2->id) 
		// 			{
		// 				$temp[] = $value3;
		// 				// unset($jender{$key3});
		// 			}
		// 		}
		// 		$grup1{$key}->child{$key2}->skpd = $temp;
		// 	}
		// }

		// return $grup1;

		if ($jenis=='rekap') 
		{
			$this->layout->content = View::make('laporan.jender')->with('jender', $grup1)->with('title', $title);
		}
		else
		{
			Excel::create("report", function($excel) use ($jender, $title)
			{
				$excel->sheet("report", function($sheet) use ($jender, $title)
				{
					$sheet->loadView('export.jender')->with('jender', $jender)->with('title', $title);
				});
			})->download('xls');
		}

	}

	public function diklat($jenis)
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN DIKLAT STRUKTURAL";
		$query = "SELECT S.id,
			S.nama as 'namaSKPD',
			pykmbh_grup1.nama as 'grup1',
			pykmbh_grup2.nama as 'grup2',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
				 AND v_pns_skpd_diklat_jk.diklat IN ('ADUM','SEPADA', 'PIM IV')) AS 'ADUM/SEPADA/PIM_IV',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
				 AND v_pns_skpd_diklat_jk.diklat IN ('SEPALA', 'ADUMLA')) AS 'ADUMLA/SEPALA',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.diklat IN ('SPAMA', 'SEPADAYA', 'PIM III')) AS 'SPAMA/SEPADYA/PIM_III',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		         AND v_pns_skpd_diklat_jk.diklat IN ('SPAMEN', 'PIM II')) AS 'SPAMEN/PIM_II',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_diklat_jk
				 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
		        AND v_pns_skpd_diklat_jk.diklat IN ('ADUM','SEPADA', 'PIM IV', 'SEPALA', 'ADUMLA', 'SPAMA', 'SEPADAYA', 'PIM III', 'SPAMEN', 'PIM II')) AS 'JML'
		FROM pykmbh_skpd S left join pykmbh_grup1 on S.grup1 = pykmbh_grup1.id left join pykmbh_grup2 on S.grup2 = pykmbh_grup2.id 
		ORDER BY S.id";

		return $diklat = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.diklat')->with('diklat', $diklat)->with('title', $title);

		if ($jenis=='rekap') 
		{
			$this->layout->content = View::make('laporan.diklat')->with('diklat', $diklat)->with('title', $title);
		}
		else
		{
			Excel::create("report", function($excel) use ($diklat, $title)
			{
				$excel->sheet("report", function($sheet) use ($diklat, $title)
				{
					$sheet->loadView('export.diklat')->with('diklat', $diklat)->with('title', $title);
				});
			})->download('xls');
		}
	}

	public function diklatJender($jenis)
	{
		return $this->grups;

		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN DIKLAT STRUKTURAL PER JENDER";

		$query = "SELECT 	S.id,
				S.nama as 'namaSKPD',
				pykmbh_grup1.nama as 'grup1',
				pykmbh_grup2.nama as 'grup2',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
					 AND (v_pns_skpd_diklat_jk.diklat = 'ADUM')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'ADUM_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
					 AND (v_pns_skpd_diklat_jk.diklat = 'ADUM')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'ADUM_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
					 AND (v_pns_skpd_diklat_jk.diklat = 'SEPADA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'SEPADA_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
					 AND (v_pns_skpd_diklat_jk.diklat = 'SEPADA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'SEPADA_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
					 AND (v_pns_skpd_diklat_jk.diklat = 'PIM IV')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'PIM_IV_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
					 AND (v_pns_skpd_diklat_jk.diklat = 'PIM IV')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'PIM_IV_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
					 AND (v_pns_skpd_diklat_jk.diklat = 'ADUM' OR v_pns_skpd_diklat_jk.diklat = 'SEPADA' OR v_pns_skpd_diklat_jk.diklat = 'PIM IV')) AS 'ADUM/SEPADA/PIM_IV',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'ADUMLA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'ADUMLA_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'ADUMLA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'ADUMLA_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SEPALA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'SEPALA_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SEPALA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'SEPALA_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'ADUMLA' OR v_pns_skpd_diklat_jk.diklat = 'SEPALA')) AS 'ADUMLA/SEPALA',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SPAMA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'SPAMA_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SPAMA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'SPAMA_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SEPADAYA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'SEPADAYA_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SEPADAYA')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'SEPADYA_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'PIM III')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'PIM_III_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'PIM III')
					AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'PIM_III_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SPAMA' OR v_pns_skpd_diklat_jk.diklat= 'SEPADYA' OR v_pns_skpd_diklat_jk.diklat = 'PIM III')) AS 'SPAMA/SEPADYA/PIM_III',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SPAMEN')
			        AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'SPAMEN_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SPAMEN')
			        AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'SPAMEN_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'PIM II')
			        AND v_pns_skpd_diklat_jk.jenisKelamin = 1) AS 'PIM_II_LK',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'PIM II')
			        AND v_pns_skpd_diklat_jk.jenisKelamin = 2) AS 'PIM_II_PR',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND (v_pns_skpd_diklat_jk.diklat = 'SPAMEN' OR v_pns_skpd_diklat_jk.diklat = 'PIM II')) AS 'SPAMEN/PIM_II',
					(SELECT COUNT(*)
					 FROM v_pns_skpd_diklat_jk
					 WHERE v_pns_skpd_diklat_jk.skpdId = S.id
			         AND v_pns_skpd_diklat_jk.diklat IN ('ADUM','SEPADA', 'PIM IV', 'SEPALA', 'ADUMLA', 'SPAMA', 'SEPADAYA', 'PIM III', 'SPAMEN', 'PIM II')
			        AND v_pns_skpd_diklat_jk.diklat IS NOT null) AS 'JML'
			FROM pykmbh_skpd S left join pykmbh_grup1 on S.grup1 = pykmbh_grup1.id left join pykmbh_grup2 on S.grup2 = pykmbh_grup2.id 
			ORDER BY S.id";

		return $diklat = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.diklatJender')->with('diklat', $diklat)->with('title', $title);
	}

	public function golongan($jenis)
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

		$this->layout->content = View::make('laporan.golongan')->with('golongan', $golongan)->with('title', $title);
	}

	public function golonganJender($jenis)
	{
		$title = "REKAPITULASI JUMLAH PNS BERDASARKAN GOLONGAN RUANG DAN JENDER";
		$query = "SELECT S.id,
			S.nama as 'namaSKPD',
			pykmbh_grup1.nama as 'grup1',
			pykmbh_grup2.nama as 'grup2',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'I/a') AS '1a_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'I/b') AS '1b_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'I/c') AS '1c_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'I/d') AS '1d_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'I/a') AS '1a_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'I/b') AS '1b_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'I/c') AS '1c_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'I/d') AS '1d_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
				 AND v_pns_skpd_gol_jk.golongan IN ('I/a','I/b','I/c','I/d')) AS 'JML_1',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'II/a') AS '2a_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'II/b') AS '2b_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'II/c') AS '2c_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'II/d') AS '2d_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'II/a') AS '2a_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'II/b') AS '2b_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'II/c') AS '2c_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'II/d') AS '2d_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
				 AND v_pns_skpd_gol_jk.golongan IN ('II/a','II/b','II/c','II/d')) AS 'JML_2',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'III/a') AS '3a_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'III/b') AS '3b_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'III/c') AS '3c_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'III/d') AS '3d_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'III/a') AS '3a_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'III/b') AS '3b_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'III/c') AS '3c_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'III/d') AS '3d_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
				 AND v_pns_skpd_gol_jk.golongan IN ('III/a','III/b','III/c','III/d')) AS 'JML_3',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'IV/a') AS '4a_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'IV/b') AS '4b_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'IV/c') AS '4c_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'IV/d') AS '4d_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 1
				 AND v_pns_skpd_gol_jk.golongan = 'IV/e') AS '4e_LK',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'IV/a') AS '4a_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'IV/b') AS '4b_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'IV/c') AS '4c_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'IV/d') AS '4d_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
		         AND v_pns_skpd_gol_jk.jenisKelamin = 2
				 AND v_pns_skpd_gol_jk.golongan = 'IV/e') AS '4e_PR',
				(SELECT COUNT(*)
				 FROM v_pns_skpd_gol_jk
				 WHERE v_pns_skpd_gol_jk.skpdId = S.id
				 AND v_pns_skpd_gol_jk.golongan = 'IV/a') AS 'JML_4'
		FROM pykmbh_skpd S left join pykmbh_grup1 on S.grup1 = pykmbh_grup1.id left join pykmbh_grup2 on S.grup2 = pykmbh_grup2.id 
		ORDER BY S.id";
	
		return $golongan = DB::select(DB::raw($query));

		$this->layout->content = View::make('laporan.golonganJender')->with('golongan', $golongan)->with('title', $title);
	}

	public function pendidikan($jenis)
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

		//$this->layout->content = View::make('laporan.pendidikan')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2)->with('title', $title);

		if ($jenis=='rekap') 
		{
			$this->layout->content = View::make('laporan.pendidikan')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2)->with('title', $title);
		}
		else
		{
			Excel::create("report", function($excel) use ($pendidikan, $title)
			{
				$excel->sheet("report", function($sheet) use ($pendidikan, $title)
				{
					$sheet->loadView('export.pendidikan')->with('pendidikan', $pendidikan)->with('title', $title);
				});
			})->download('xls');
		}
	}

	public function pendidikanJender($jenis)
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

		$this->layout->content = View::make('laporan.pendidikanJender')->with('pendidikan', $pendidikan)->with('pendidikan2', $pendidikan2)->with('title', $title);
	}

	public function eselon($jenis)
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

		$this->layout->content = View::make('laporan.eselon')->with('eselon', $eselon)->with('title', $title);
	}

	public function eselonJender($jenis)
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

		$this->layout->content = View::make('laporan.eselonJender')->with('eselon', $eselon)->with('title', $title);
	}

	public function belum()
	{
		$this->layout->content = View::make('belum');
	}

}

