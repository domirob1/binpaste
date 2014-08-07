<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PublicPastes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pastes', function(Blueprint $table)
		{
      $table->tinyInteger('public')->default(False);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pastes', function(Blueprint $table)
		{
			$table->dropColumn('public');
		});
	}

}
