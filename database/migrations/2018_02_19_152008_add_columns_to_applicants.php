<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('created_at')->after('status');
			      $table->string('updated_at')->after('created_at');

            $table->integer('score_1')->after('pr');
            $table->integer('score_2')->after('score_1');
            $table->integer('score_3')->after('score_2');
            $table->integer('score_4')->after('score_3');
            $table->integer('score_5')->after('score_4');
            $table->integer('score_6')->after('score_5');
            $table->integer('score_7')->after('score_6');
            $table->string('score_age')->after('score_7');
            $table->longText('score_biko')->after('score_age');
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
