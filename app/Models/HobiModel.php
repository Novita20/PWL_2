<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobiModel extends Model
{
    use HasFactory;
    protected $table = 'hobiModel';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
}