<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikel_models')->insert([
        [
            'id'=>'A1112',
            'judul'=>'5 Bocah Ini Terkenal Karena Jago Coding',
            'Penulis'=>'Arina Yulistara',
            'tgl_publish'=>'04 November 2018'
        ],
        [
            'id'=>'A1113',
            'judul'=>'Perbedaan Lumen dan Laravel',
            'Penulis'=>'Faisal Hanafi',
            'tgl_publish'=>'6 Januari 2023'

        ],
        [
            'id'=>'A1114',
            'judul'=>'Dunia Coding',
            'Penulis'=>'Rahmadani',
            'tgl_publish'=>'8 Januari 2023'
         ],
         [
            'id'=>'A1115',
            'judul'=>'Ngoding itu Asikk',
            'Penulis'=>'Dindahaw',
            'tgl_publish'=>'8 Maret 2020'
         ]
        ]);
    }
}
