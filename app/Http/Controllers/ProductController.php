<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
    return "
    <ul>
        <li><a href='/products/marbel-edu-games'>https://www.educastudio.com/category/marbel-edu-games</a></li>
        <li><a href='/products/marbel-and-friends-kids-games'>https://www.educastudio.com/category/marbel-and-friends-kids-games</a></li>
        <li><a href='/products/riri-story-books'>https://www.educastudio.com/category/riri-story-books</a></li>
        <li><a href='/products/kolak-kids-songs'>https://www.educastudio.com/category/kolak-kids-songs</a></li>
    </ul>";
    }
}
