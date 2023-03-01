<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(){
        return view("prak1.program");
    }

    public function kr(){
        return "Karir";
    }

    public function mg(){
        return "Magang";
    }

    public function ki(){
        return "Kunjungan Industri";
    }
}