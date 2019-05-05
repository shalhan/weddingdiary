<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroomPhotoIntoMsgroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('msgroom', function (Blueprint $table) {
            $table->string('GROOM_PHOTO')->nullable();
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
            $table->dropColumn('GROOM_PHOTO');
        });
    }
}
