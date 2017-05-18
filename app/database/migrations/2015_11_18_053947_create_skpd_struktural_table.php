<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkpdStrukturalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_skpd_jabatan', function($table)
		{
		    $table->increments('id');
		    $table->integer('skpdId')->unsigned();
		    $table->integer('jabatanId')->unsigned();
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
		Schema::drop('pykmbh_skpd_jabatan');
		
	}

}
