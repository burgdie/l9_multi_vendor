<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailsTableSeeder extends Seeder
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
            'vendor_id'=>1,
            'shop_name'=> 'John Electronics',
            'shop_address' => 'Lessingstr. 19',
            'shop_city' => 'Affalterbach',
            'shop_state' => 'Baden Württemberg',
            'shop_country'=>'Deutschland',
            'shop_pincode' => '11001',
            'shop_mobile' => '+491727116663',
            'shop_website'=>'https://regiomahl.de',
            'shop_email' => 'regiomahl@info.de',
            'address_proof'=> 'Passport',
            'address_proof_image' => 'logo.png',
            'business_license_number'=> '132435355',
            'gst_number' => '446466446',
            'pan_number'=> '242355346'
          ]
          ];
          VendorsBusinessDetail::insert($vendorRecords);

    }
}
