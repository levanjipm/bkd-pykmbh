<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabStrukturalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_jab_struktural', function($table)
		{
		    $table->increments('id');
		    $table->string('nama', 200);
		    $table->string('eselon_huruf', 200);
		    $table->string('eselon_angka', 200);
		    $table->integer('indukId')->unsigned();
		    $table->tinyInteger('level');
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
		Schema::drop('pykmbh_jab_struktural');
	}

}
