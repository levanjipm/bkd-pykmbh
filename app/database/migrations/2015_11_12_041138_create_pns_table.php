<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pykmbh_pns', function($table)
		{
		    $table->increments('id');
		    $table->integer('userId')->unsigned();
		    $table->string('NIPBaru', 200);
		    $table->string('NIPLama', 200);
		    $table->string('nama', 200);
		    $table->tinyInteger('jenisKelamin');
		    $table->string('Agama', 100);
		    $table->string('gelarDepan', 200);
		    $table->string('gelarBelakang', 200);
		    $table->string('tempatLahir', 200);
		    $table->date('tanggalLahir');
		    $table->string('kedudukanHukum', 200);
		    $table->string('jenisPegawai', 200);
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
		Schema::drop('pykmbh_pns');
	}

}
