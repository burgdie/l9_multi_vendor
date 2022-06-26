<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>1, 'name'=>'Super Admin','type'=>'superadmin',
            'vendor_id'=> 0,
            'mobile'=>'+491721234567',
            'email'=> 'admin@gmail.com',
            'password' => '$2a$12$CVeqSsQA9f16i738R7i2/OUaJS4mm7hr1QwYtDuqBLzbdKRT6g6uG', //123456
            'image'=> '',
            'status' => 1
            ]
        ];
        Admin::insert($adminRecords);

        $adminRecords = [
            ['id'=>2, 'name'=>'Dieter','type'=>'vendor',
            'vendor_id'=> 1,
            'mobile'=>'+491727116663',
            'email'=> 'burgdie@gmail.com',
            'password' => '$2a$12$CVeqSsQA9f16i738R7i2/OUaJS4mm7hr1QwYtDuqBLzbdKRT6g6uG', //123456
            'image'=> '',
            'status' => 0
            ]
        ];
        Admin::insert($adminRecords);
    }
}
