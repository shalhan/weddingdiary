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
            $vendor->email = strtolower($vendor->VENDOR_NAME2) . '@gmail.com';
            $vendor->password = bcrypt("123456");
            $vendor->VENDOR_URL = $vendor->VENDOR_WEBSITE;
            $vendor->update();
        }
    }
}
