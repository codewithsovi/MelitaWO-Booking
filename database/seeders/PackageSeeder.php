<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packages')->insert([
            [
                'jenis' => 'Paket Silver',
                'harga' => 5000000,
                'deskripsi' => 'Paket pernikahan dengan layanan dasar.',
                'status' => 'aktif',
            ],
            [
                'jenis' => 'Paket Gold',
                'harga' => 10000000,
                'deskripsi' => 'Paket pernikahan dengan layanan lengkap.',
                'status' => 'aktif',
            ],
            [
                'jenis' => 'Paket Platinum',
                'harga' => 20000000,
                'deskripsi' => 'Paket pernikahan premium dengan layanan eksklusif.',
                'status' => 'non aktif',
            ],
        ]);
    }
}
