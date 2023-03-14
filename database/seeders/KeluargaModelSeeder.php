<?php

namespace Database\Seeders;

use App\Models\HobiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('KeluargaModel')->insert([
        [
            'id'=> 'B001',
            'nama'=> 'Cak Pri',
            'status'=> 'Suami',
        ],
        [
            'id'=> 'B002',
            'nama'=> 'Buk Pri',
            'status'=> 'Istri',
        ],
        [
            'id'=> 'B003',
            'nama'=> 'Adinda Kurnia',
            'status'=> 'Anak'
        ]]);
        }
}
