<?php

namespace App\Http\Controllers;

use App\Models\HobiModel;
use App\Models\KeluargaModel;
use Illuminate\Http\Request;

class KeluargaModelController extends Controller
{
    public function index(){
        $data = KeluargaModel::all();
        return view('p4.kel') ->with('kel', $data);
    }
}
