<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'iqbal',
                'no_hp' => '0987654321',
                'alamat' => 'semarang',
                'role' => 'pasien',
                'email' => 'iqbal@gmail.com',
                'password' => 'password',
            ],
            [
                'nama' => 'rudi',
                'no_hp' => '0987654323',
                'alamat' => 'semarang',
                'role' => 'dokter',
                'email' => 'rudi@gmail.com',
                'password' => 'password',
            ],
            [
                'nama' => 'gunawan',
                'no_hp' => '0987654324',
                'alamat' => 'semarang',
                'role' => 'pasien',
                'email' => 'gunawan@gmail.com',
                'password' => 'password',
            ],
            [
                'nama' => 'yudi',
                'no_hp' => '0987654325',
                'alamat' => 'semarang',
                'role' => 'dokter',
                'email' => 'yudi@gmail.com',
                'password' => 'password',
            ],
        ];
        foreach ($data as $d) {
            User::create([
                'nama' => $d['nama'],
                'email' => $d['email'],
                'password' => $d['password'],
                'alamat' => $d['alamat'],
                'no_hp' => $d['no_hp'],
                'role' => $d['role'],
            ]);
        }
    }
}
