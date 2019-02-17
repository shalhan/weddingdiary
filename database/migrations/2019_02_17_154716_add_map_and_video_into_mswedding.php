<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMapAndVideoIntoMswedding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mswedding', function (Blueprint $table) {
            $table->text('WEDDING_MAP')->nullable();
            $table->text('WEDDING_VIDEO')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mswedding', function (Blueprint $table) {
            $table->dropColumn('WEDDING_MAP');
            $table->dropColumn('WEDDING_VIDEO');
        });
    }
}
