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
            'password' => '$2a$12$K53Y2FoT9qr9pP6G0fICjOktM73n6wLUWnATY9QdJD93HKOZ3G3t.', //password
            'image'=> '',
            'status' => 1
            ]
        ];
        Admin::insert($adminRecords);
    }
}
