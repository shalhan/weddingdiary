<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverIntoMscoupleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mscouple', function (Blueprint $table) {
            $table->dropColumn("COUPLE_COVER");
            $table->string("COUPLE_COVER_1")->nullable();
            $table->string("COUPLE_COVER_2")->nullable();
            $table->string("COUPLE_COVER_3")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mscouple', function (Blueprint $table) {
            $table->string("COUPLE_COVER");
            $table->dropColumn("COUPLE_COVER_1");
            $table->dropColumn("COUPLE_COVER_2");
            $table->dropColumn("COUPLE_COVER_3");
        });
    }
}
