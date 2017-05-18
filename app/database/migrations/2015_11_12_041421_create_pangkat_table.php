<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePangkatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_pangkat', function($table)
		{
		    $table->increments('id');
		    // $table->string('pangkat', 50);
		    $table->string('golongan', 50);
		    $table->string('ruang', 50);
		    // $table->string('eselon', 50);
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
		Schema::drop('pykmbh_pangkat');
	}

}
