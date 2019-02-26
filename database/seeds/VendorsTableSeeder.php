<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendors = Vendor::get();
        foreach($vendors as $vendor) {
            $vendor->TOKEN = md5($vendor->VENDOR_WEBSITE . $vendor->GUID);
            $vendor->update();
        }
    }
}
