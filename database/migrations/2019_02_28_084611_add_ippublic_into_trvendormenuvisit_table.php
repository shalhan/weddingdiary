<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIppublicIntoTrvendormenuvisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trvendormenuvisit', function (Blueprint $table) {
            $table->string("IPPUBLIC")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trvendormenuvisit', function (Blueprint $table) {
            $table->dropColumn("IPPUBLIC");
        });
    }
}
