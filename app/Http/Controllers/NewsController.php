<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return "
        <ul>
            <li><a href='#'>https://www.educastudio.com/news</a></li>
            <li><a href='/news/educa-studio-berbagi-untuk-warga-sekitarterdampak-covid-19'>https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitarterdampak-covid-19</a></li>
        </ul>
        ";
    }

    public function x($param){
        return "News: <a href='https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitarterdampak-covid-19'>https://www.educastudio.com/news/$param</a>";
    }
}
