<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController as ComicController;


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
//Route della pagina principale
Route::get('/', [ComicController::class, 'gaspare'])->name('homepage');
//Route della seconda pagina
Route::get('/single-card/{slug}', [ComicController::class, 'show'])->name('single-card');

//Funzione per cambiare la data
function changeDate($saleDate)
{
    $date = $saleDate['sale_date'];
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('M d Y');
}