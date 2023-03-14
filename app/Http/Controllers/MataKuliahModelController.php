<?php

namespace App\Http\Controllers;

use App\Models\HobiModel;
use App\Models\KeluargaModel;
use App\Models\MataKuliahModel;
use Illuminate\Http\Request;

class MataKuliahModelController extends Controller
{
    public function index(){
        $data = MataKuliahModel::all();
        return view('p4.mk') ->with('mk', $data);
    }
}
