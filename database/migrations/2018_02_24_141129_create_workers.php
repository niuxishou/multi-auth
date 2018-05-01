<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('worker_id');
            $table->integer('applicant_id');
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
            $table->longText('job');
            $table->longText('job_2');
            $table->longText('job_3');
        	$table->integer('points');
        	$table->text('selfpr');
        	$table->longText('profile');
        	$table->longText('condition');
            $table->string('score_age');
            $table->longText('score_biko');
            $table->string('taiou_area');
            $table->string('taiou_area_2');
            $table->integer('score_1');
            $table->integer('score_2');
            $table->integer('score_3');
            $table->integer('score_4');
            $table->integer('score_5');
            $table->integer('score_6');
            $table->integer('score_7');
            $table->string('can_do');
            $table->string('can_do_1');
        	$table->string('can_do_2');
        	$table->string('can_do_3');
        	$table->string('can_do_4');
        	$table->string('can_do_5');
        	$table->string('can_do_6');
        	$table->string('can_do_7');
            $table->string('profile_img_path');
            $table->string('delete_flag');
        	$table->string('created_at');
        	$table->string('updated_at');
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
