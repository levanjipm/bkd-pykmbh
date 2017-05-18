<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotPnsJabstruktural extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_pns_struktural', function($table)
		{
		   	$table->integer('pnsId')->unsigned();
		   	$table->integer('pnsSkpdId')->unsigned();
		    $table->integer('skpdStrukturalId')->unsigned();
		    $table->date('TMT');
		    $table->tinyInteger('aktif');
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
		Schema::drop('pykmbh_pns_struktural');
	}

}
