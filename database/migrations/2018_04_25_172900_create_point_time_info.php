<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointTimeInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_time_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('points_cut')->default(0);
            $table->integer('points_color')->default(0);
            $table->integer('points_pama')->default(0);
            $table->integer('points_correction')->default(0);
            $table->integer('points_extension')->default(0);
            $table->integer('points_haircut')->default(0);
            $table->float('times_cut',5)->default(0);
            $table->float('times_color',5)->default(0);
            $table->float('times_pama',5)->default(0);
            $table->float('times_correction',5)->default(0);
            $table->float('times_extension',5)->default(0);
            $table->float('times_haircut',5)->default(0);
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
    }
}
