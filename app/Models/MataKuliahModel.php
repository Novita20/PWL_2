<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliahModel extends Model
{
    use HasFactory;
    protected $table = 'MataKuliahModel';
    public $timestamps = false;
    protected $primary = 'id_matkul';
    protected $keyType ='string';
    protected $fillable=[
        'kode_matkul',
        'mataKuliah',
        'pengajar',        
    ];
}
