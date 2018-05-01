<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reports', function (Blueprint $table) {
          $table->increments('id');
          $table->string('user_id');
          $table->string('user_name');
          $table->string('worker_id');
          $table->string('worker_name');
          $table->string('order_id');
          $table->string('content_1');
          $table->string('content_2');
          $table->string('content_3');
          $table->string('content_4');
          $table->string('content_5_path_1');
          $table->string('content_5_path_2');
          $table->string('content_5_path_3');
          $table->string('content_5_path_4');
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
