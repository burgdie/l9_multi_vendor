<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
          [
            'id'=>1,
            'name'=>'Dieter',
            'address'=>"Lessingstr. 19",
            'city'=>"Affalterbach",
            'state'=>"Baden-Württemberg",
            'country'=>"Deutschland",
            'pincode'=>"110001",
            'mobile'=>"+491727116663",
            'email'=>"burgdie@gmail.com",
            'status'=>0,

          ]
        ];
        Vendor::insert($vendorRecords);
    }
}
