<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeWeddingAttributeIntoNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mswedding', function (Blueprint $table) {
            $table->string("WEDDING_MATRIMONY_VENUE", 100)->nullable()->change();
            $table->string("WEDDING_MATRIMONY_ADDRESS")->nullable()->change();
            $table->dateTime("WEDDING_MATRIMONY_TIME")->nullable()->change();
            $table->string("WEDDING_MATRIMONY_TIMEZONE", 50)->nullable()->change();

            $table->string("WEDDING_RECEPTION_VENUE", 100)->nullable()->change();
            $table->string("WEDDING_RECEPTION_ADDRESS")->nullable()->change();
            $table->dateTime("WEDDING_RECEPTION_TIME")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mswedding', function (Blueprint $table) {
            //
        });
    }
}
