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
                'nama' => 'Nafilah',
                'email' => 'nafilah@example.com',
                'phone' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 123',
                'status' => 'diproses',
                'package_id' => 1,
            ]
        ]);
    }
}
