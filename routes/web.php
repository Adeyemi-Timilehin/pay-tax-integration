<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XeroController;
use App\Http\Controllers\VendController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Xero Integration
Route::get('xero/connect',[XeroController::class,'index']);

Route::group(['middleware' => ['web', 'XeroAuthenticated']], function(){
    Route::get('xero', [XeroController::class,'result']);
});

//Vend Integration
Route::get('/vend',[VendController::class,'index']);
Route::get('vend/connect',[VendController::class,'callback']);