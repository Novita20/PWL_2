<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliahmodel')->insert([
            [
                'kode_matkul'=> 'C001',
                'mataKuliah'=> 'Basis Data',
                'pengajar'=> 'Rahmadan ST.,MT.'
            ],
            [
                'kode_matkul'=> 'B002',
                'mataKuliah'=> 'Algoritma Struktur Data',
                'pengajar'=> 'Dea ST.,M.Kom.'
            ],
            [
                'kode_matkul'=> 'B003',
                'mataKuliah'=> 'Proyek',
                'pengajar'=> 'Imin ST.,M.Kom.',
            ]]);
            }
    }

