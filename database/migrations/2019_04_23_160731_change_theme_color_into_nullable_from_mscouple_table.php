<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeThemeColorIntoNullableFromMscoupleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mscouple', function (Blueprint $table) {
            $table->string('THEME_COLOR_1')->nullable()->change();
            $table->string('THEME_COLOR_2')->nullable()->change();
            $table->string('THEME_COLOR_3')->nullable()->change();
            $table->string('THEME_COLOR_4')->nullable()->change();
            $table->string('THEME_COLOR_5')->nullable()->change();
            $table->string('THEME_COLOR_6')->nullable()->change();
            $table->string('THEME_COLOR_7')->nullable()->change();
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
            
        });
    }
}
