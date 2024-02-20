<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "id" => random_int(1, 1000),
            "username" => Str::random(10),
            "password" => Str::random(10),
            "nama_petugas" => Str::random(10),
            "level" => "petugas",
        ]);
    }
}
