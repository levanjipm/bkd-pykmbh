<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/kgb/hitung', 'KGBController@hitung_kgb');//pindahkan after login
Route::resource('/kgb', 'KGBController');//pindahkan after login


Route::group(array('before'=>'logged'), function()
{

	Route::resource('/', 'DashboardController');
	Route::resource('/berita', 'BeritaController');
	Route::resource('/user', 'UserController');
	Route::get('/laporan/export', 'LaporanController@export');
	Route::resource('/laporan', 'LaporanController');
	Route::resource('/log', 'LogController');
	Route::resource('/user', 'UserController');
	Route::get('/struktur-organisasi', 'StrukturOrganisasiController@index');
	Route::get('/struktur-organisasi/{id}', 'StrukturOrganisasiController@show');
	
	Route::group(array('prefix' => 'laporan'), function()
	{
		Route::get('/jender/{jenis}', 'LaporanController@jender');

		Route::get('/diklat/{jenis}', 'LaporanController@belum');
		Route::get('/diklat-jender/{jenis}', 'LaporanController@belum');

		Route::get('/golongan/{jenis}', 'LaporanController@belum');
		Route::get('/golongan-jender/{jenis}', 'LaporanController@belum');

		Route::get('/pendidikan/{jenis}', 'LaporanController@belum');
		Route::get('/pendidikan-jender/{jenis}', 'LaporanController@belum');

		Route::get('/eselon/{jenis}', 'LaporanController@belum');
		Route::get('/eselon-jender/{jenis}', 'LaporanController@belum');

		Route::get('/komposisi-eselon/{jenis}', 'LaporanController@belum');
		Route::get('/komposisi-kecamatan/{jenis}', 'LaporanController@belum');
	
	});

	Route::group(array('prefix' => 'laporan-jft'), function()
	{
		Route::group(array('prefix' => 'rekap'), function()
		{
			Route::get('/jender', 'LaporanJFTController@belum');

			Route::get('/diklat', 'LaporanJFTController@belum');
			Route::get('/diklat-jender', 'LaporanJFTController@belum');

			Route::get('/golongan', 'LaporanJFTController@belum');
			Route::get('/golongan-jender', 'LaporanJFTController@belum');

			Route::get('/pendidikan', 'LaporanJFTController@belum');
			Route::get('/pendidikan-jender', 'LaporanJFTController@belum');
		});

		Route::group(array('prefix' => 'export'), function()
		{
			Route::get('/jender', 'ExportLaporanJFTController@belum');

			Route::get('/diklat', 'ExportLaporanJFTController@belum');
			Route::get('/diklat-jender', 'ExportLaporanJFTController@belum');

			Route::get('/golongan', 'ExportLaporanJFTController@belum');
			Route::get('/golongan-jender', 'ExportLaporanJFTController@belum');

			Route::get('/pendidikan', 'ExportLaporanJFTController@belum');
			Route::get('/pendidikan-jender', 'ExportLaporanJFTController@belum');
		});
	});


	Route::group(array('prefix' => 'laporan-esl-jfu'), function()
	{
		Route::get('/jender/{jenis}', 'LaporanEslJFUController@belum');

		Route::get('/diklat/{jenis}', 'LaporanEslJFUController@belum');
		Route::get('/diklat-jender/{jenis}', 'LaporanEslJFUController@belum');

		Route::get('/golongan/{jenis}', 'LaporanEslJFUController@belum');
		Route::get('/golongan-jender/{jenis}', 'LaporanEslJFUController@belum');

		Route::get('/pendidikan/{jenis}', 'LaporanEslJFUController@belum');
		Route::get('/pendidikan-jender/{jenis}', 'LaporanEslJFUController@belum');

		Route::get('/eselon/{jenis}', 'LaporanEslJFUController@belum');
		Route::get('/eselon-jender/{jenis}', 'LaporanEslJFUController@belum');


		Route::group(array('prefix' => 'rekap'), function()
		{
			Route::get('/jender', 'LaporanEslJFUController@jender');

			Route::get('/diklat', 'LaporanEslJFUController@belum');
			Route::get('/diklat-jender', 'LaporanEslJFUController@belum');

			Route::get('/golongan', 'LaporanEslJFUController@belum');
			Route::get('/golongan-jender', 'LaporanEslJFUController@belum');

			Route::get('/pendidikan', 'LaporanEslJFUController@belum');
			Route::get('/pendidikan-jender', 'LaporanEslJFUController@belum');

			Route::get('/eselon', 'LaporanEslJFUController@belum');
			Route::get('/eselon-jender', 'LaporanEslJFUController@belum');
		});
		Route::group(array('prefix' => 'export'), function()
		{
			Route::get('/jender', 'ExportLaporanEslJFUController@belum');

			Route::get('/diklat', 'ExportLaporanEslJFUController@belum');
			Route::get('/diklat-jender', 'ExportLaporanEslJFUController@belum');

			Route::get('/golongan', 'ExportLaporanEslJFUController@belum');
			Route::get('/golongan-jender', 'ExportLaporanEslJFUController@belum');

			Route::get('/pendidikan', 'ExportLaporanEslJFUController@belum');
			Route::get('/pendidikan-jender', 'ExportLaporanEslJFUController@belum');

			Route::get('/eselon', 'ExportLaporanEslJFUController@eselon');
			Route::get('/eselon-jender', 'ExportLaporanEslJFUController@belum');
		});
	});


	Route::group(array('prefix' => 'data'), function()
	{
		Route::get('/pns/cari', 'PNSController@search');
		Route::get('/pns/banding', 'PNSController@compare');
		Route::post('/pns/banding', 'PNSController@comparing');
		Route::post('/pns/import', 'PNSController@import');
		Route::resource('/pns', 'PNSController');
		
		Route::post('/pns/{id}/pendidikan', 'PNSDataController@pendidikan');
		Route::post('/pns/{id}/diklat', 'PNSDataController@diklat');
		Route::post('/pns/{id}/pangkat', 'PNSDataController@pangkat');
		Route::post('/pns/{id}/skpd', 'PNSDataController@skpd');
		Route::post('/pns/{id}/jabatan-fungsional', 'PNSDataController@fungsional');
		Route::post('/pns/{id}/jabatan-struktural', 'PNSDataController@struktural');
		Route::post('/pns/{id}/instansi-kerja', 'PNSDataController@instansiKerja');
		Route::post('/pns/{id}/instansi-induk', 'PNSDataController@instansiInduk');

		Route::get('/pns/{id}/getcompare', 'PNSController@pnsShow');

		Route::get('/pendidikan/cari', 'PendidikanController@search');
		Route::resource('/pendidikan', 'PendidikanController');
		Route::post('/pendidikan/import', 'PendidikanController@import');
		
		Route::get('/pangkat/cari', 'PangkatController@search');
		Route::resource('/pangkat', 'PangkatController');
		Route::post('/pangkat/import', 'PangkatController@import');
		
		Route::get('/skpd/cari', 'SKPDController@search');
		Route::resource('/skpd', 'SKPDController');
		Route::post('/skpd/import', 'SKPDController@import');
		Route::post('/skpd/{id}/jabatan', 'SKPDController@jabatan');
		
		Route::get('/instansi/cari', 'InstansiController@search');
		Route::resource('/instansi', 'InstansiController');
		Route::post('/instansi/import', 'InstansiController@import');
		
		Route::get('/diklat/cari', 'DiklatController@search');
		Route::resource('/diklat', 'DiklatController');
		Route::post('/diklat/import', 'DiklatController@import');
		
		Route::get('/jabatan-fungsional/cari', 'JabFungsionalController@search');
		Route::resource('/jabatan-fungsional', 'JabFungsionalController');
		Route::post('/jabatan-fungsional/import', 'JabFungsionalController@import');

		Route::get('/jabatan-struktural/cari', 'JabStrukturalController@search');
		Route::resource('/jabatan-struktural', 'JabStrukturalController');
		Route::post('/jabatan-struktural/import', 'JabStrukturalController@import');
	});

Route::get('/ganti-pejabat/{id}','StrukturOrganisasiController@updatePejabat');
Route::post('/ganti-pejabat/{id}','StrukturOrganisasiController@EditPejabat');

Route::get('/logout', 'AuthController@destroy');
});

Route::get('/tes', function()
{
	return $skpd = DB::table('pykmbh_skpd_jabatan')->select('skpdid')->where('id', 451)->get();

	return $pns = DB::table('pykmbh_pns_skpd')
		->select('pykmbh_pns_skpd.id', 'pykmbh_pns.nama', 'pykmbh_pns.nipbaru')
		->join('pykmbh_pns', 'pykmbh_pns_skpd.pnsid', '=', 'pykmbh_pns.id')
		->where('pykmbh_pns_skpd.skpdid', $skpd->skpdid)
		->get();
});