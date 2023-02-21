<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Richiamo Comic
use App\Models\Comic as Comic;

class ComicController extends Controller
//Esercizio base
{
    public function getAllCards(){
        $products = Comic::all();
        $productsmenu = config('comics.menu');
        $productsicon = config('comics.icon');
        $productsocial = config('comics.social');
        return view('main-content', compact('products','productsmenu','productsicon','productsocial'));
    }

    //Metodo find bouns 1
    // public function shows($id){

    //     $comic = Comic::find($id);
    //     $single = [
    //         'single' => $comic
    //     ];
    //     $productsmenu = config('comics.menu');
    //     $productsicon = config('comics.icon');
    //     $productsocial = config('comics.social');
    //     // function changeDate($saleDate)
    //     // {
    //     //     $date = $saleDate['sale_date'];
    //     //     return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('M d Y');
    //     // }

    //     return view('single-card',$single ,compact( 'productsmenu', 'productsicon', 'productsocial'))->with('changeDate');
        
    // }

    //Metodo Slug Bonus 2
    public function show($slug){

        $comic = Comic::where('slug', $slug)->get();
        $comic = $comic[0];
        $single = [
            'single' => $comic
        ];
        $productsmenu = config('comics.menu');
        $productsicon = config('comics.icon');
        $productsocial = config('comics.social');
            return view('single-card',$single ,compact( 'productsmenu', 'productsicon', 'productsocial'));
            
        }
}
