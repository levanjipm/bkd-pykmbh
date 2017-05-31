<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAktifOnKgb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pykmbh_kgb', function(Blueprint $table)
		{
			$table->integer('aktif')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pykmbh_kgb', function(Blueprint $table)
		{
			$table->dropColumn('aktif');
		});
	}

}
