<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('reactions', function($table) {
	        $table->increments('id');
	        $table->string('text');
	        $table->string('name');
	        $table->string('object');
	        $table->integer('object_id');
	        $table->string('ip');

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
		Schema::drop('blog_reactions');
	}

}
