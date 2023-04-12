<?php

namespace Database\Seeders;

use App\Models\TransaksiModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // TransaksiSeeder::class,
            MobilSeeder::class,
        ]);

    }
}