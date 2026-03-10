<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(request $request)
    {
        $query = Product::query();

        if($request->category){
            $query->where('category_id',$request->category);
        }

        if($request->min_price && $request->max_price){
            $query->whereBetween('price',[$request->min_price , $request->max_price]);
        }

        if($request->rating){
            $query->where('rating','>=',$request->rating);
        }

        $products = $query->select('id','name','category_id','price','image','rating')->get();

        $categories = category::all();

        if($request->ajax()){
            return response()->json($products);
        };

        return view('home',compact('products','categories'));

        // return response()->json($products);

        // dd($products);
    }
    // public function index()
    // {
    //     $categories = Category::orderBy('id', 'asc')
    //         ->get();

    //     $products = Product::orderBy('id', 'desc')                      
    //         ->take(15)
    //         ->get();

    //     // $newlyArrived = Product::latest()
    //     //     ->take(8)
    //     //     ->get();

    //     // $bestSelling = Product::latest()
    //     //     ->take(8)
    //     //     ->get();

    //     // $mostPopular = Product::inRandomOrder()
    //     //     ->take(8)
    //     //     ->get();

    //     $cartCount = session()->has('cart') ? count(session('cart')) : 0;

    //     return view('home', compact(
    //         'categories',
    //         'products',
    //         'cartCount'
    //     ));

    //     // return view('home', compact(
    //     //     'categories',
    //     //     'Products',
    //     //     'newlyArrived',
    //     //     'bestSelling',
    //     //     'mostPopular',
    //     //     'cartCount'
    //     // ));
    // }
}
