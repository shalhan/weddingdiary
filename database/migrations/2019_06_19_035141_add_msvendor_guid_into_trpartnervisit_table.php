<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMsvendorGuidIntoTrpartnervisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trpartnervisit', function (Blueprint $table) {
            $table->integer("MSVENDOR_GUID")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trpartnervisit', function (Blueprint $table) {
            $table->dropColumn("MSVENDOR_GUID");
        });
    }
}
