<?php

use Illuminate\Database\Seeder;
use App\Couple;

class CouplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PREFIX = "wedding=";
        $couples = Couple::with(["groom", "bride"])->get();
        foreach($couples as $couple) {
            $couple->SUBFOLDER2 = $PREFIX . strtolower($couple->groom->GROOM_NAME) . strtolower($couple->bride->BRIDE_NAME);
            $couple->update();
        }
    }
}
