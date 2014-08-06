<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('pastes', function($table) {
      $table->increments('id');
      $table->timestamps();
      $table->string('name');
      $table->text('paste');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::drop('pastes');
	}

}
