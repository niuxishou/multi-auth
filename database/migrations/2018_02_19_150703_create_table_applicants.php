<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
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
			$table->string('kakuninfile_1');
			$table->string('kakuninfile_1_path');
			$table->string('kakuninfile_2');
			$table->string('kakuninfile_2_path');
			$table->string('shikakufile_1');
			$table->string('shikakufile_1_path');
			$table->string('shikakufile_2');
			$table->string('shikakufile_2_path');
			$table->longText('job');
			$table->longText('pr');
			$table->string('status');
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
