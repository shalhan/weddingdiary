<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFatherAndMotherNameIntoNullableInGroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('msgroom', function (Blueprint $table) {
            $table->string("GROOM_FATHER_NAME")->nullable()->change();
            $table->string("GROOM_FATHER_ISHAVINGPHOTO")->nullable()->change();
            $table->string("GROOM_FATHER_VISIBLE")->nullable()->change();
            $table->string("GROOM_MOTHER_NAME")->nullable()->change();
            $table->string("GROOM_MOTHER_ISHAVINGPHOTO")->nullable()->change();
            $table->string("GROOM_MOTHER_VISIBLE")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('msgroom', function (Blueprint $table) {
            //
        });
    }
}
