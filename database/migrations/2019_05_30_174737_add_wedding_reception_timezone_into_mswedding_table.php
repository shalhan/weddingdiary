<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeddingReceptionTimezoneIntoMsweddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mswedding', function (Blueprint $table) {
            $table->string("WEDDING_RECEPTION_TIMEZONE", 5)->nullable();
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
            $table->dropColumn("WEDDING_RECEPTION_TIMEZONE", 5);
        });
    }
}
