<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slideshow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    function index (){
        return view('admin.product.index');
    }
    // function getProduct()
    // {
    //     $products = Product::all()->paginate(2);
    //     $products->setPath('/admins/product');

    //     // return view('admin.slideshow.slideshowList', compact('slideshows'));
    //     return response()->json([
    //         'data' => view('admin.product.productList', compact('products'))->render(),
    //         'pagination' => (string) $products->links('vendor.pagination.bootstrap-4'),
    //     ]);
    // }
    function getProduct()
    {
        $products = Product::with('category')->paginate(2); // Eager load the category relationship

        return response()->json([
            'data' => $products,
            'pagination' => (string) $products->links('vendor.pagination.bootstrap-4')->withQueryString(),
        ]);
    }
}