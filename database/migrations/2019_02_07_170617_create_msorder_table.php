<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msorder', function (Blueprint $table) {
            $table->increments('id');
            $table->double('couple_id', 16, 4);
            $table->double('template_id', 16, 4);
            $table->double('vendor_id', 16, 4);
            $table->string('sub_folder');
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
        Schema::dropIfExists('msorder');
    }
}
