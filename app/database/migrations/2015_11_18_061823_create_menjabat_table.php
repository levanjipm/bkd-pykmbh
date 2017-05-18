<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenjabatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('pykmbh_menjabat', function($table)
		// {
		//     $table->increments('id');
		//     $table->integer('pnsId')->unsigned();
		//     $table->integer('jabatanId')->unsigned();
		//     $table->timestamps();
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('pykmbh_skpd_jabatan');
		
	}

}
