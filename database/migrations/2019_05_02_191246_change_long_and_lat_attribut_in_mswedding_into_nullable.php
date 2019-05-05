<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLongAndLatAttributInMsweddingIntoNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mswedding', function (Blueprint $table) {
            $table->string("WEDDING_MATRIMONY_LAT")->nullable()->change();
            $table->string("WEDDING_MATRIMONY_LONG")->nullable()->change();
            $table->string("WEDDING_RECEPTION_LAT")->nullable()->change();
            $table->string("WEDDING_RECEPTION_LONG")->nullable()->change();
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
