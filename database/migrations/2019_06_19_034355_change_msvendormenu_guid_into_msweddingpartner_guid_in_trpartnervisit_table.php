<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMsvendormenuGuidIntoMsweddingpartnerGuidInTrpartnervisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trpartnervisit', function (Blueprint $table) {
            $table->renameColumn("MSVENDORMENU_GUID", "MSWEDDINGPARTNER_GUID");
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
            $table->renameColumn("MSWEDDINGPARTNER_GUID", "MSVENDORMENU_GUID");
        });
    }
}
