<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkAppend extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pykmbh_pns', function($table) 
		{
	       	$table->foreign('userId')->references('id')->on('users');
	   	});

	   	Schema::table('pykmbh_kgb', function($table) 
		{
	       	$table->foreign('pnsId')->references('id')->on('pykmbh_pns');
	   	});

	   	Schema::table('pykmbh_skpd', function($table) 
		{
	       	$table->foreign('indukId')->references('id')->on('pykmbh_skpd');
	   	});

	   	Schema::table('pykmbh_pns_skpd', function($table) 
		{
	       	$table->foreign('pnsId')->references('id')->on('pykmbh_pns');
	       	$table->foreign('skpdId')->references('id')->on('pykmbh_skpd');
	   	});

	   	Schema::table('pykmbh_pns_pendidikan', function($table) 
		{
	       	$table->foreign('pnsId')->references('id')->on('pykmbh_pns');
	       	$table->foreign('pendidikanId')->references('id')->on('pykmbh_pendidikan');
	   	});

	   	Schema::table('pykmbh_pns_diklat', function($table) 
		{
	       	$table->foreign('pnsId')->references('id')->on('pykmbh_pns');
	       	$table->foreign('diklatId')->references('id')->on('pykmbh_diklat');
	   	});

	   	Schema::table('pykmbh_pns_pangkat', function($table) 
		{
	       	$table->foreign('pnsId')->references('id')->on('pykmbh_pns');
	       	$table->foreign('pangkatId')->references('id')->on('pykmbh_pangkat');
	   	});

	   	Schema::table('pykmbh_pns_fungsional', function($table) 
		{
	       	$table->foreign('pnsId')->references('id')->on('pykmbh_pns');
	       	$table->foreign('fungsionalId')->references('id')->on('pykmbh_jab_fungsional');
	   	});

	   	Schema::table('pykmbh_pns_struktural', function($table) 
		{
	       	$table->foreign('pnsSkpdId')->references('id')->on('pykmbh_pns_skpd');
	       	$table->foreign('skpdStrukturalId')->references('id')->on('pykmbh_skpd_jabatan');
	   	});

	   	Schema::table('pykmbh_instansi_induk', function($table) 
		{
	       	$table->foreign('pnsId')->references('id')->on('pykmbh_pns');
	       	$table->foreign('instansiId')->references('id')->on('pykmbh_instansi');
	   	});

	   	Schema::table('pykmbh_instansi_kerja', function($table) 
		{
	       	$table->foreign('pnsId')->references('id')->on('pykmbh_pns');
	       	$table->foreign('instansiId')->references('id')->on('pykmbh_instansi');
	   	});

	   	Schema::table('log', function($table) 
		{
	       	$table->foreign('userId')->references('id')->on('users');
	   	});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
