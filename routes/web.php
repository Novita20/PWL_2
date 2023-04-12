<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArtikelModelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\HobiModelController;
use App\Http\Controllers\KeluargaModelController;
use App\Http\Controllers\MahasiswaController;
// use App\Http\Controllers\MahasiswaModelController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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





// Route::get('/', [PengalamanController::class, 'index'])->name('pengalaman');



 Route::get('/about', [AboutController::class, 'index']);
 Route::get('/article/{id}', [ArticleController::class, 'index']);
 
 Route::prefix('products')->group(function(){
 Route::get('/', [ProductController::class, 'index']);
 Route::get('/marbel-edu-games', function (){
        return "Marbel Edu Games";
     });
    Route::get('/marbel-and-friends-kids-games', function (){
        return "Marbel and Friends Kids Games";
    });
   Route::get('/riri-story-books', function (){
        return "Riri Story Books";
    });
    Route::get('/kolak-kids-songs', function (){
        return "Kolak Kids Songs";
    });
 });
     Route::get('/', [HomeController::class,'index']);
     Route::get('/news', [NewsController::class, 'index']);
     Route::get('/news/{news}', [NewsController::class, 'x']);

     Route::prefix('program')->group(function() {
     Route::get('/', [ProgramController::class, 'index']);
     Route::get('/karir', [ProgramController::class, 'kr']);
     Route::get('/magang', [ProgramController::class, 'mg']);
     Route::get('/kunjungan-industri', [ProgramController::class, 'ki']);
      });

     Route::get("/about-us", [AboutUsController::class, 'xy']);
     Route::get("/contactus", [ContactUsController::class, 'contactus']);
     Route::get('/artikel_models', [ArtikelModelController::class, 'index']);

     
Auth::routes(); 
Route::get('logout', [LoginController::class, 'logout']); 

Route::get('/tes', function(){
    echo Hash::make('1').'<br>';
    echo Hash::make('1') . '<br>';
    echo Hash::make('1') . '<br>'; 
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/article/{id}', [ArticleController::class, 'index']);
    Route::resource('/hobi', HobiModelController::class)->name('index','hobi');
    Route::resource('/keluarga', KeluargaModelController::class)->parameter('keluarga','id')->name('index','kel');  
    Route::resource('/matkul', MataKuliahController::class)->name('index','matkul');
    

    // Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/ex', [ExperienceController::class, 'index'])->name('pengalaman');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    // Route::get("/hobi", [HobiModelController::class, 'index'])->name('hobi');
    // Route::get("/kel", [KeluargaModelController::class, 'index'])->name('kel');
    // Route::get("/mk", [MataKuliahModelController::class, 'index'])->name('mk');
    Route::resource('/mobil', MobilController::class);
    });


