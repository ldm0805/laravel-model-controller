<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic as Comic;

class ComicController extends Controller
{
    public function gaspare(){
        $products = Comic::all();
        $productsmenu = config('comics.menu');
        $productsicon = config('comics.icon');
        $productsocial = config('comics.social');
        return view('index',compact('products','productsmenu','productsicon','productsocial'));
    }
    // public function show($id){

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

    //Metodo Slug
    public function show($slug){

        $comic = Comic::where('slug', $slug)->get();
        $single = [
            'single' => $comic
        ];
        $productsmenu = config('comics.menu');
        $productsicon = config('comics.icon');
        $productsocial = config('comics.social');
        // function changeDate($saleDate)
        // {
            //     $date = $saleDate['sale_date'];
            //     return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('M d Y');
            // }
            
            return view('single-card',$single ,compact( 'productsmenu', 'productsicon', 'productsocial'))->with('changeDate');
            
        }

}
