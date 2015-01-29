<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('comment',function(Blueprint $table){

            $table->increments('id');
            $table->tinyInteger('el_id');
            $table->tinyInteger('type_id');
            $table->tinyInteger('parent_id')->default(0);
            $table->string('username');
            $table->string('email');
            $table->text('content');
            $table->integer('support_num');
            $table->integer('oppose_num');
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
		//
        Schema::drop('comment');
	}

}
