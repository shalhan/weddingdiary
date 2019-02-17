<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubDir2IntoMscouple extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mscouple', function (Blueprint $table) {
            $table->string("SUBFOLDER2")->nullable();
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
            $table->dropColumn('SUBFOLDER2');
        });
    }
}
