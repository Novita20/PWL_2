<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AboutUsController;

// use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     echo 'Selamat Datang';
// });

// Route:: get('/about', function(){
//     echo "2141720050-Novita Dwi Rahmadani";
// });

// Route:: get('/articles/{id}', function ($id){
//     echo "Halaman Artikel dengan ID " . $id;
// });


// Route::get('/', [HomeController::class, 'index']);
//  Route::get('/about', [AboutController::class, 'index']);
//  Route::get('/article/{id}', [ArticleController::class, 'index']);
 
//  Route::prefix('product')->group(function () {
//           Route::get('/', [ProductController::class, 'index']);
//           Route::get('/marbel-edu-game', fn()=>"Marbel-edu-game");
//           Route::get('/marbel-and-friends-kids-games', fn()=>"marbel-and-friends-kids-games");
//           Route::get('/riri-story-books', fn()=>"riri-story-books");
//           Route::get('/kolak-kids-songs', fn()=>"kolak-kids-songs");
    
//       });

// Route::get('/', [HomeController::class,'index']);

    //  Route::get('/news', [NewsController::class, 'index']);
    //  Route::get('/news/{news}', [NewsController::class, 'x']);

    //    Route::prefix('program')->group(function() {
    //        Route::get('/', [ProgramController::class, 'index']);
    //        Route::get('/karir', [ProgramController::class, 'kr']);
    //        Route::get('/magang', [ProgramController::class, 'mg']);
    //        Route::get('/kunjungan-industri', [ProgramController::class, 'ki']);
    //   });
    //  Route::get("/about-us", [AboutUsController::class, 'xy']);
     Route::get("/contactus", [ContactUsController::class, 'contactus']);