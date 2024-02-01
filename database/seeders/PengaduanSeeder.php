<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nik = DB::table('masyarakats')->insertGetId([
           "nik" => "3215053011060005",
           "nama" => "Haafidz Raditya Adibrata",
           "username" => "haafidz",
           "password" => substr(md5("haafidz"), 0, 32),
           "telp" => "089512341155",
        ]);

        DB::table('pengaduans')->insert([
            "id_pengaduan" => random_int(1, 20),
            "tgl_pengaduan" => now(),
            "nik" => "3215053011060005",
            "isi_laporan" => Str::random(255),
            "foto" => Str::random(255),
            "status" => '0'
        ]);
    }
}