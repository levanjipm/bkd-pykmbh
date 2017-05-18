<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotPnsJabfungsional extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_pns_fungsional', function($table)
		{
		    $table->integer('pnsId')->unsigned();
		    $table->integer('fungsionalId')->unsigned();
		    // $table->string('jenis', 100);
		    $table->tinyInteger('aktif');
		    $table->date('TMT');
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
		Schema::drop('pykmbh_pns_fungsional');
	}

}
