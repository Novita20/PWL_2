<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MataKuliahModel', function (Blueprint $table) {
            $table->id ('id_matkul');
            $table->string ('kode_matkul',5)->nullable();
            $table->string ('mataKuliah',30)->nullable();
            $table->string ('pengajar', 30)->nullable();
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliah_models');
    }
};
