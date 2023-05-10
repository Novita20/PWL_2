<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';
    public $timestamps = false;
    // protected $primaryKey = 'kode';
    // protected $keyType = 'string';
    protected $fillable = [
        'nama_matkul',
        'sks',
        'jam',
        'semester',
    ];
    public function mahasiswa_matakuliah()
    {
        return $this->hasMany(MahasiswaMataKuliah::class, 'matakuliah_id', 'id');
    }
}
