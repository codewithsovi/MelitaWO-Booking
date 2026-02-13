<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'tanggal_acara' => '2026-02-10',
                'waktu_acara' => '14:00:00',
                'lokasi_acara'=>'Ambunten',
                'catatan_tambahan'=>'acara akad pernikahan',
                'client_id'=> 1,
            ],
            [
                'tanggal_acara' => '2026-04-10',
                'waktu_acara' => '14:00:00',
                'lokasi_acara'=>'Ambunten',
                'catatan_tambahan'=>'acara akad pernikahan',
                'client_id'=> 2,
            ],
            [
                'tanggal_acara' => '2026-02-10',
                'waktu_acara' => '10:00:00',
                'lokasi_acara'=>'Ambunten',
                'catatan_tambahan'=>'acara akad pernikahan',
                'client_id'=> 2,
            ],
        ]);
    }
}
