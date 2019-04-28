<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoupleCoverIntoMscoupleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mscouple', function (Blueprint $table) {
            $table->string('COUPLE_COVER')->nullable();
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
            $table->dropColumn('COUPLE_COVER');
        });
    }
}
