<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('name_kana');
			$table->string('post');
			$table->string('pref');
			$table->string('address_1');
			$table->string('address_2');
			$table->string('address_3');
			$table->string('gender');
			$table->string('birthday');
			$table->string('age');
			$table->string('email');
			$table->string('tel');
			$table->string('created_at');
			$table->string('updated_at');
			$table->string('delete_flag');
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
    }
}
