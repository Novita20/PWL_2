<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(){
        return "
        <ul>
            <li>https://www.educastudio.com/program/karir</li>
            <li>https://www.educastudio.com/program/magang</li>
            <li>https://www.educastudio.com/program/kunjungan-industri</li>
        </ul>
        ";
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