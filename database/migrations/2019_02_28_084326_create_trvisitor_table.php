<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrvisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trvisitor', function (Blueprint $table) {
            $table->increments('GUID');
            $table->integer('MSCOUPLE_GUID');
            $table->string('IPPUBLIC');
            $table->string('BROWSER')->nullable();
            $table->string('OS')->nullable();
            $table->dateTime('DATETIME');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trvisitor');
    }
}
