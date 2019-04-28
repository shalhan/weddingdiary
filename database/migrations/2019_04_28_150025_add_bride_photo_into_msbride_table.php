<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBridePhotoIntoMsbrideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('msbride', function (Blueprint $table) {
            $table->string('BRIDE_PHOTO')->nullable();
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
            $table->dropColumn('BRIDE_PHOTO');
        });
    }
}
