<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTextsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('page_texts', function($table) {
	        $table->increments('id');
	        $table->string('element');
	        $table->text('text');
	        $table->integer('pages_id')->unsigned();
	        $table->foreign('pages_id')->references('id')->on('pages');
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
		Schema::drop('page_texts');
	}

}
