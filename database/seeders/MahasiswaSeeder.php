<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $mahasiswas = [
            [
                'nim' => '241011701028',
                'nama' => 'Anang Syah Amirul Haqim',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2024,
                'tgl_lahir' => '2003-10-20',
                'no_hp' => '089670068639',
                'gambar' => 'andi.jpg',
            ],
            [
                'nim' => '241011701025',
                'nama' => 'Kusuma Yuda',
                'prodi' => 'Teknik Informatika',
                'angkatan' => 2024,
                'tgl_lahir' => '2004-10-20',
                'no_hp' => '089670068639',
                'gambar' => 'bambang.jpg',
            ],
            [
                'nim' => '241011701023',
                'nama' => 'Arif Rafida',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2024,
                'tgl_lahir' => '1999-10-20',
                'no_hp' => '089670068639',
                'gambar' => 'fajar.jpg',
            ],
            [
                'nim' => '241011701027',
                'nama' => 'Sultan Faiz',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2024,
                'tgl_lahir' => '2001-10-20',
                'no_hp' => '089670068639',
                'gambar' => 'rizky.jpg',
            ],
            [
                'nim' => '241011701047',
                'nama' => 'Hadi',
                'prodi' => 'Teknik Elektro',
                'angkatan' => 2023,
                'tgl_lahir' => '2004-03-19',
                'no_hp' => '089670068639',
                'gambar' => 'yusuf.jpg',
            ],
        ];

        foreach ($mahasiswas as $mhs) {
            \App\Models\Mahasiswa::create($mhs);
        }
    }
}
