<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotPnsPendidikan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_pns_pendidikan', function($table)
		{
		    $table->integer('pnsId')->unsigned();
		    $table->integer('pendidikanId')->unsigned();
		    $table->integer('lulus');
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
		Schema::drop('pykmbh_pns_pendidikan');
	}

}
