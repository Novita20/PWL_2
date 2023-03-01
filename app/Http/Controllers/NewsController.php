<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function x($param){
        return view("prak1.news");
    }
}
