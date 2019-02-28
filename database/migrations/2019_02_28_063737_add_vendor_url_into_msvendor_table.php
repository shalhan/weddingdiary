<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVendorUrlIntoMsvendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('msvendor', function (Blueprint $table) {
            $table->string("VENDOR_URL")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('msvendor', function (Blueprint $table) {
            $table->dropColumn("VENDOR_URL");
        });
    }
}
