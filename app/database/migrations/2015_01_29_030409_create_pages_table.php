<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('pages',function(Blueprint $table){

            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->tinyInteger('is_open')->default(0);
            $table->tinyInteger('is_comment')->default(0);
            $table->string('seo_key')->nullable();
            $table->string('seo_desc')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('pages');
	}

}
