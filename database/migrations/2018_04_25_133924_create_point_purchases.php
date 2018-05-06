<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('point_purchases', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->string('name',100);
          $table->integer('buy_points')->nullable();//購入ポイント
          $table->string('pay_way')->nullable();//決済方法
          $table->dateTime('request_date')->nullable();//申請日
          $table->string('status',30)->nullable();
          $table->string('bank_name',30)->nullable();
          $table->string('bank_branch_name',30)->nullable();
          $table->string('kouza_type',10)->nullable();
          $table->string('kouza_number',10)->nullable();
          $table->string('kouza_name',30)->nullable();
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
