<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTemplateIdIntoMscouple extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mscouple', function (Blueprint $table) {
            $table->integer('MSTEMPLATE_GUID')->nullable()->unsigned();
            $table->foreign('MSTEMPLATE_GUID')->references('id')->on('mstemplate')->onDelete('cascade');
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
            $table->dropForeign(['MSTEMPLATE_GUID']);
            $table->dropColumn('MSTEMPLATE_GUID');
        });
    }
}
