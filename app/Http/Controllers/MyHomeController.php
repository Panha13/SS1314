<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Models\Product;
use App\Models\Category;


class MyHomeController extends Controller
{
    function index()
    {
        $slideshows = Slideshow::where('enable', '1')
                        ->orderBy('ssorder')
                        ->get();
        $featuredproducts = Product::where('featured', '1')->get();
        $categories = Category::all();
        return view('home', compact('slideshows', 'featuredproducts', 'categories'));
    }
    function shop()
    {
        $categories = Category::all();
        return view('shop')->with('categories', $categories);
    }
    function getData()
    {
        // Retrieve the updated data from the database
        $data = MyModel::all();

        // Return the data as a JSON response
        return response()->json($data);
    }
    
}
