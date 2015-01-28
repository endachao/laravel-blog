<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('navigation',function(Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->tinyInteger('order_key')->default(0);
            $table->string('type')->default('top');
            $table->tinyInteger('is_open')->default(1);
            $table->tinyInteger('is_new')->default(1);

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
        Schema::drop('navigation');
	}

}
