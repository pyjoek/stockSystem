<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Vita1Controller;
use App\Http\Controllers\Vita2Controller;
use App\Http\Controllers\Vita3Controller;
use App\Http\Controllers\Vita4Controller;
use App\Http\Controllers\Vita5Controller;
use App\Http\Controllers\Vita6Controller;
use App\Http\Controllers\Vita7Controller;
use App\Http\Controllers\Vita8Controller;
use App\Http\Controllers\Vita9Controller;
use App\Http\Controllers\Vita10Controller;
use App\Http\Controllers\Vita11Controller;
use App\Http\Controllers\Vita12Controller;
use App\Http\Controllers\Vita13Controller;
use App\Http\Controllers\Vita14Controller;
use App\Http\Controllers\Vita15Controller;

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
//     return view('welcome');
// });

require __DIR__.'/auth.php';

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

Route::group(['middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->middleware(['auth'])->name('dashboard');
    
    Route::get('/', function () {
        return view('welcome');
    })->middleware(['auth'])->name('welcome');
//get paths only here
Route::get('/vita1',[Vita1Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita2',[Vita2Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita3',[Vita3Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita4',[Vita4Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita5',[Vita5Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita6',[Vita6Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita7',[Vita7Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita8',[Vita8Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita9',[Vita9Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita10',[Vita10Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita11',[Vita11Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita12',[Vita12Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita13',[Vita13Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita14',[Vita14Controller::class, 'index'])->middleware(['auth']);
Route::get('/vita15',[Vita15Controller::class, 'index'])->middleware(['auth']);


//reaching to the new page
Route::get('/vita1/new',function(){return view('vita1.vita');})->middleware(['auth']);
Route::get('/vita2/new',function(){return view('vita2.vita');})->middleware(['auth']);
Route::get('/vita3/new',function(){return view('vita3.vita');})->middleware(['auth']);
Route::get('/vita4/new',function(){return view('vita4.vita');})->middleware(['auth']);
Route::get('/vita5/new',function(){return view('vita5.vita');})->middleware(['auth']);
Route::get('/vita6/new',function(){return view('vita6.vita');})->middleware(['auth']);
Route::get('/vita7/new',function(){return view('vita7.vita');})->middleware(['auth']);
Route::get('/vita8/new',function(){return view('vita8.vita');})->middleware(['auth']);
Route::get('/vita9/new',function(){return view('vita9.vita');})->middleware(['auth']);
Route::get('/vita10/new',function(){return view('vita10.vita');})->middleware(['auth']);
Route::get('/vita11/new',function(){return view('vita11.vita');})->middleware(['auth']);
Route::get('/vita12/new',function(){return view('vita12.vita');})->middleware(['auth']);
Route::get('/vita13/new',function(){return view('vita13.vita');})->middleware(['auth']);
Route::get('/vita14/new',function(){return view('vita14.vita');})->middleware(['auth']);
Route::get('/vita15/new',function(){return view('vita15.vita');})->middleware(['auth']);


//sending new records
Route::post('/vita1/add',[Vita1Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita2/add',[Vita2Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita3/add',[Vita3Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita4/add',[Vita4Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita5/add',[Vita5Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita6/add',[Vita6Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita7/add',[Vita7Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita8/add',[Vita8Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita9/add',[Vita9Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita10/add',[Vita10Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita11/add',[Vita11Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita12/add',[Vita12Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita13/add',[Vita13Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita14/add',[Vita14Controller::class, 'store'])->middleware(['auth']);
Route::post('/vita15/add',[Vita15Controller::class, 'store'])->middleware(['auth']);

});

Route::group(['middleware' => ['web', 'auth', 'role:user']], function () {
    Route::get('/vita1Store',[Vita1Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita2Store',[Vita2Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita3Store',[Vita3Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita4Store',[Vita4Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita5Store',[Vita5Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita6Store',[Vita6Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita7Store',[Vita7Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita8Store',[Vita8Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita9Store',[Vita9Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita10Store',[Vita10Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita11Store',[Vita11Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita12Store',[Vita12Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita13Store',[Vita13Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita14Store',[Vita14Controller::class, 'show'])->middleware(['auth']);
    Route::get('/vita15Store',[Vita15Controller::class, 'show'])->middleware(['auth']);
});

Route::get('/logout', [Controller::class, 'logout'])->name('logout');
