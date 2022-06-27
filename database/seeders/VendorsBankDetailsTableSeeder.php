<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $vendorRecords= [
        [
          'id' =>1,
          'vendor_id' => 1,
          'account_holder_name'=>'Dieter Burgstaller',
          'bank_name'=>'KSK-LB',
          'account_number'=>'604555522',
          'bank_ifsc_code'=>'1234567'
        ]
      ];
      VendorsBankDetail::insert($vendorRecords);
    }
}
