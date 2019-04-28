<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFatherAndMotherNameIntoNullableInMsbrideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('msbride', function (Blueprint $table) {
            $table->string("BRIDE_FATHER_NAME")->nullable()->change();
            $table->string("BRIDE_FATHER_ISHAVINGPHOTO")->nullable()->change();
            $table->string("BRIDE_FATHER_VISIBLE")->nullable()->change();
            $table->string("BRIDE_MOTHER_NAME")->nullable()->change();
            $table->string("BRIDE_MOTHER_ISHAVINGPHOTO")->nullable()->change();
            $table->string("BRIDE_MOTHER_VISIBLE")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('msbride', function (Blueprint $table) {
            //
        });
    }
}
