<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotPnsSkpd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_pns_skpd', function($table)
		{
		    $table->increments('id');
		    $table->integer('pnsId')->unsigned();
		    $table->integer('skpdId')->unsigned();
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
		// Schema::drop('pykmbh_pns_skpd');
	}

}
