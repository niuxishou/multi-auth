<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTalks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('user_id');
            $table->integer('worker_id');
            $table->string('name')->nullable();
            $table->longText('content')->nullable();
            $table->string('date')->nullable();
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
