<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileColumnToLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logos', function (Blueprint $table) {
            //
            $table->string('file',120)->nullable()->comment('');
            $table->string('file_name',120)->nullable()->comment('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logos', function (Blueprint $table) {
            //
        });
    }
}
