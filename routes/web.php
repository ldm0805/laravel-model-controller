<?php

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

Route::get('/', function () {
    $products = config('comics.fumetti');
    $productsmenu = config('comics.menu');
    $productsicon = config('comics.icon');
    $productsocial = config('comics.social');

    return view('index', compact('products','productsmenu','productsicon','productsocial'));
})->name('homepage');

Route::get('/single-card/{id}', function ($id) {
    $products = config('comics.fumetti');
    $productsmenu = config('comics.menu');
    $productsicon = config('comics.icon');
    $productsocial = config('comics.social');
    $single = '';
    foreach ($products as $key => $product) {       
        if ($id == $key) {
            $single = $product;
        }
    }

    function changeDate($saleDate)
    {
        $date = $saleDate['sale_date'];
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('M d Y');
    }

    return view('single-card', compact('products', 'productsmenu', 'productsicon', 'productsocial', 'single'))->with('changeDate');
})->name('single-card');

