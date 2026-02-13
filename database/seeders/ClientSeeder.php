<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'nama_client' => 'Nafi',
                'email' => 'nafi@example.com',
                'phone' => '081234567690',
                'alamat' => 'Jl. Kusuma No. 123',
                'status' => 'diproses',
                'package_id' => 1,
            ],
             [
                'nama_client' => 'Alfi',
                'email' => 'ilah@example.com',
                'phone' => '0812367890',
                'alamat' => 'Jl. Merdeka No. 128',
                'status' => 'diproses',
                'package_id' => 2,
            ],
            [
                'nama_client' => 'sovia',
                'email' => 'silah@example.com',
                'phone' => '0812367890',
                'alamat' => 'Jl. Merdeka No. 128',
                'status' => 'diterima',
                'package_id' => 2,
            ],
        ]);
    }
}
