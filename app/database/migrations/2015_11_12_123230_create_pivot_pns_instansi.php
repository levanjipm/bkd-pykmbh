<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotPnsInstansi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_instansi_induk', function($table)
		{
		    $table->integer('pnsId')->unsigned();
		    $table->integer('instansiId')->unsigned();
		    $table->timestamps();
		});

		Schema::create('pykmbh_instansi_kerja', function($table)
		{
		    $table->integer('pnsId')->unsigned();
		    $table->integer('instansiId')->unsigned();
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pykmbh_instansi_kerja');
		Schema::drop('pykmbh_instansi_induk');
	}

}
