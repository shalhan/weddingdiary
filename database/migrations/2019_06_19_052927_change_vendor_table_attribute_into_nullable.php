<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeVendorTableAttributeIntoNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('msvendor', function (Blueprint $table) {
            $table->string("VENDOR_NAME2")->nullable()->change();
            $table->string("VENDOR_BGLOGO")->nullable()->change();
            $table->string("VENDOR_PREFIX")->nullable()->change();
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
            //
        });
    }
}
