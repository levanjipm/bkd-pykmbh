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

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');

Route::group(array('before'=>'logged'), function()
{

	Route::resource('/', 'DashboardController');
	Route::resource('/laporan', 'LaporanController');
	Route::resource('/log', 'LogController');
	Route::resource('/user', 'UserController');
	Route::get('/struktur-organisasi', 'StrukturOrganisasiController@index');
	Route::post('/struktur-organisasi', 'StrukturOrganisasiController@show');
	
	Route::group(array('prefix' => 'data'), function()
	{
		Route::get('/pns/banding', 'PNSController@compare');
		Route::post('/pns/banding', 'PNSController@comparing');
		Route::resource('/pns', 'PNSController');
		Route::post('/pns/import', 'PNSController@import');
		Route::post('/pns/{id}/pendidikan', 'PNSDataController@pendidikan');
		Route::post('/pns/{id}/diklat', 'PNSDataController@diklat');
		Route::post('/pns/{id}/pangkat', 'PNSDataController@pangkat');
		Route::post('/pns/{id}/skpd', 'PNSDataController@skpd');
		Route::post('/pns/{id}/jabatan-fungsional', 'PNSDataController@fungsional');
		Route::post('/pns/{id}/jabatan-struktural', 'PNSDataController@struktural');
		Route::post('/pns/{id}/instansi-kerja', 'PNSDataController@instansiKerja');
		Route::post('/pns/{id}/instansi-induk', 'PNSDataController@instansiInduk');

		Route::resource('/pendidikan', 'PendidikanController');
		Route::post('/pendidikan/import', 'PendidikanController@import');
		
		Route::resource('/pangkat', 'PangkatController');
		Route::post('/pangkat/import', 'PangkatController@import');
		
		Route::resource('/skpd', 'SKPDController');
		Route::post('/skpd/import', 'SKPDController@import');
		Route::post('/skpd/{id}/jabatan', 'SKPDController@jabatan');
		
		Route::resource('/instansi', 'InstansiController');
		Route::post('/instansi/import', 'InstansiController@import');
		
		Route::resource('/diklat', 'DiklatController');
		Route::post('/diklat/import', 'DiklatController@import');
		
		Route::resource('/jabatan-fungsional', 'JabFungsionalController');
		Route::post('/jabatan-fungsional/import', 'JabFungsionalController@import');

		Route::resource('/jabatan-struktural', 'JabStrukturalController');
		Route::post('/jabatan-struktural/import', 'JabStrukturalController@import');
	});

	Route::get('/logout', 'AuthController@destroy');
});


Route::get('/cobiangrup', function ()
{
	$group = Sentry::createGroup(array(
        'name'        => 'SuperAdmin',
        'permissions' => array(
            'god' => 1
        ),
    ));
    return 'success';
});

Route::get('/cobianuser', function ()
{
	$user = Sentry::createUser(array(
        'email'     => 'admin@admin.com',
        'password'  => 'admin',
        'activated' => true,
    ));

     // Find the group using the group id
    $adminGroup = Sentry::findGroupById(1);

    // Assign the group to the user
    $user->addGroup($adminGroup);
    return 'success';
});