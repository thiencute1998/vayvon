<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('type')->nullable()->comment('1: Bài viết, 2: Bộ sưu tập');
            $table->mediumText('content')->nullable();
            $table->tinyInteger('status')->nullable()->default(1)->comment('1: Hoạt động, 0: Không hoạt động');
            $table->integer('order')->nullable()->comment('Thứ tự');
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
        Schema::dropIfExists('products');
    }
}
