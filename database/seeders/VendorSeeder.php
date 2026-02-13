<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendors')->insert([
            [
                'jenis_vendor' => 'catering'
            ],
            [
                'jenis_vendor' => 'soundsystem'
            ],
            [
                'jenis_vendor' => 'dekor'
            ],
        ]);
    }
}
