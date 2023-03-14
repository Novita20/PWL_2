<?php

namespace Database\Seeders;

use App\Models\HobiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobiModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobiModel')->insert([
        [
            'id'=> 'A001',
            'nama'=> 'Novita Dwi R',
            'hobi'=> 'Ngoding'
        ],
        [
            'id'=> 'A002',
            'nama'=> 'Afifah Nofa',
            'hobi'=> 'Scroll Vscode'
        ],
        [
            'id'=> 'A003',
            'nama'=> 'Adinda Kurnia',
            'hobi'=> 'Scroll Netbeans'
        ]]);
        }
}
