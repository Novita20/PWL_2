<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function index(){
        echo "Selamat Datang";
    }
    public function about(){
        echo "2141720050-Novita Dwi Rahmadani";
    }
    public function articles($id){
        echo "Halaman Artikel dengan Id (id)";
    }
    
}
