<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabFungsionalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_jab_fungsional', function($table)
		{
		    $table->increments('id');
		    // $table->integer('skpdId')->unsigned();
		    $table->string('nama', 200);
		    $table->string('jenis', 50);
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
		Schema::drop('pykmbh_jab_fungsional');
	}

}
