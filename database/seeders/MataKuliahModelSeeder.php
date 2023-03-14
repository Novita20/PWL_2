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
        DB::table('MataKuliahModel')->insert([
            [
                'id'=> 'C001',
                'mataKuliah'=> 'Basis Data',
                'pengajar'=> 'Rahmadan ST.,MT.',
            ],
            [
                'id'=> 'B002',
                'mataKuliah'=> 'Algoritma Struktur Data',
                'pengajar'=> 'Dea ST.,M.Kom.',
            ],
            [
                'id'=> 'B003',
                'mataKuliah'=> 'Proyek',
                'pengajar'=> 'Imin ST.,M.Kom.',
            ]]);
            }
    }

