<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("mstemplate")->insert([
            "code_name"=>"template-1",
            "path"=>"template.template1"
        ]);
        DB::table("mstemplate")->insert([
            "code_name"=>"template-2",
            "path"=>"template.template2"
        ]);
    }
}
