<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\periksa;

class PeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_pasien' => '1',
                'id_dokter' => '2',
                'catatan' => 'sakit perut jangan telat makan ya',
                'biaya_periksa' => 600000

            ],
            [
                'id_pasien' => '3',
                'id_dokter' => '4',
                'catatan' => 'sakit perut jangan telat makan ya',
                'biaya_periksa' => 600000

            ],
        ];
        foreach ($data as $d) {
            periksa::create([
                'id_pasien' => $d['id_pasien'],
                'id_dokter' => $d['id_dokter'],
                'catatan' => $d['catatan'],
                'biaya_periksa' => $d['biaya_periksa'],

            ]);
        }
    }
}
