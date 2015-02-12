<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('page_media', function($table) {
	        $table->increments('id');
	        $table->string('url');
	        $table->string('type');
	        $table->integer('page_texts_id')->unsigned();
	        $table->foreign('page_texts_id')->references('id')->on('page_texts');
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
		Schema::drop('page_media');
	}

}
