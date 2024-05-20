<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVayVonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vay_von', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('Ma khoan vay');
            $table->string('phone', 100)->nullable()->comment('SDT');
            $table->string('user_name', 100)->nullable()->comment('Name');
            $table->bigInteger('amount_money')->nullable()->comment('Tien');
            $table->bigInteger('amount')->nullable()->comment('SL khoan vay');
            $table->tinyInteger('is_pay')->nullable()->comment('Thanhtoan');
            $table->tinyInteger('status')->default(1)->comment('Trang thai');
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
        Schema::dropIfExists('vay_von');
    }
}
