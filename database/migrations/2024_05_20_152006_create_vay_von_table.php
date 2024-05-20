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
            $table->bigInteger('amount_loan')->nullable()->comment('SL khoan vay');
            $table->bigInteger('amount_money')->nullable()->comment('Tien');
            $table->string('interest_rate', 30)->nullable()->comment('Lai suat');
            $table->string('except', 30)->nullable()->comment('Mien giam');
            $table->string('service_charge', 30)->nullable()->comment('Phi dich vu');
            $table->bigInteger('money_pay')->nullable()->comment('So tien phai tra');
            $table->date('loan_date')->nullable()->comment('Ngay vay');
            $table->date('pay_date')->nullable()->comment('Ngay tra');
            $table->mediumText('note')->nullable()->comment('Ghi chu');
            $table->tinyInteger('is_pay')->nullable()->comment('Thanhtoan');
            $table->tinyInteger('status')->default(1)->comment('Trang thai');
            $table->integer('stt')->nullable()->comment('STT');
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
