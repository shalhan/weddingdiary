<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsweddingpartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msweddingpartner', function (Blueprint $table) {
            $table->increments('GUID');
            $table->integer("MSCOUPLE_GUID");
            $table->string('WEDDING_PARTNER_NAME')->nullable();
            $table->string('WEDDING_PARTNER_WEBSITE')->nullable();
            $table->string('WEDDING_PARTNER_LOGO')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msweddingpartner');
    }
}
