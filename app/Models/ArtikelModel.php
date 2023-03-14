<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    use HasFactory;
    protected $table = 'artikel_models';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
}
