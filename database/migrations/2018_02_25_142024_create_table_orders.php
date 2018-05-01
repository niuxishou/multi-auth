<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
			$table->string('user_id');
			$table->string('user_name');
			$table->string('worker_id');
			$table->string('worker_name');
			$table->string('content_1');
			$table->string('content_2');
			$table->string('content_3');
			$table->string('content_4');
			$table->string('content_5');
			$table->string('content_6');
			$table->string('points');
			$table->string('date');
			$table->string('status');
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
