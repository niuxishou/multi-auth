<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShikakuToApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('shikakufile_3')->after('shikakufile_2_path');
            $table->string('shikakufile_3_path')->after('shikakufile_3');
            $table->string('shikakufile_4')->after('shikakufile_3_path');
            $table->string('shikakufile_4_path')->after('shikakufile_4');
            $table->string('shikakufile_5')->after('shikakufile_4_path');
            $table->string('shikakufile_5_path')->after('shikakufile_5');
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
