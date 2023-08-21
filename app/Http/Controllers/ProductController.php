<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
     function shop()
    {
        $products = Product::Where('featured', '1')->get();
        $categories = Category::all();
        return view('shop', compact('products', 'categories'));
    }

    function list_category($id)
    {
        $products = Product::Where('cid', $id)->get();
        $categories = Category::all();

        return view('shop', compact('products', 'categories'));


    }
    public function listAll()
    {
        $products = Product::paginate(5); // Assuming you want to paginate the products, change the value '10' to your desired pagination limit.

        return view('admin.product.index', compact('products'));
    }
    function redirectToProduct(Request $request)
    {
        // // Get the current page from the request
        // $page = $request->query('page', 1);
        // // Redirect back to the product listing with the current page preserved
        // return redirect()->route('admin.product', ['page' => $page]);

        // Get the current page from the request
        $page = $request->query('page', 1);
        // Redirect back to the listAll route with the current page preserved
        return redirect()->route('admin.product.listAll', ['page' => $page]);
    }
    public function add(Request $request)
    {

        $product = new Product();
        $product->pname = $request->input('txtpname');
        $product->pdesc = $request->input('txtpdesc');
        $product->pprice = $request->input('txtpprice');
        $product->featured = $request->input('txtfeatured');
        $product->quantity = $request->input('txtquantity');
        $product->cid = $request->input('txtcid');

        $ext = $request->file('pimg')->getClientOriginalExtension();
        $iname = time() . "." . $ext;
        $pathname = public_path('images/products');

        // Save the original image
        $request->file('pimg')->move($pathname, $iname);
        $product->pimg = $iname;

        // Create a thumbnail of the image
        $thumbnail = Image::make($pathname . '/' . $iname);
        $thumbnail->resize(50, 50);
        $thumbnail->save($pathname . '/thumbnail/' . $iname);

        $product->save();

        return $this->redirectToProduct($request);
    }

    public function delete(Request $request, $pid)
    {
        $product = Product::find($pid);
        if ($product != null) {
            $iname = $product['pimg'];
            $image = public_path() . '/images/products/' . $iname;
            $thumbnail = public_path() . '/images/products/thumbnail/' . $iname;
            if (file_exists($image)) {
                unlink($image);
            }
            if (file_exists($thumbnail)) {
                unlink($thumbnail);
            }

            $product->delete();

            return $this->redirectToProduct($request)->with('success', 'A product has been deleted successfully!');
        } else
            return $this->redirectToProduct($request)->with('fail', 'product not found!');
    }

    public function update(Request $request)
    {


        $pid = $request->txtpid;
        $product = Product::find($pid);

        if ($product) {
            $product->pname = $request->txteditpname;
            $product->pdesc = $request->txteditpdesc;
            $product->pprice = $request->txteditpprice;
            $product->featured = $request->txteditfeatured;
            $product->quantity = $request->txteditquantity;
            $product->cid = $request->txteditcid;

            if ($request->hasFile('editpimg')) {
                $ext = $request->file('editpimg')->getClientOriginalExtension();
                $iname = time() . "." . $ext;
                $pathname = public_path('images/products');

                // Save the original image
                $request->file('editpimg')->move($pathname, $iname);

                // Create a thumbnail of the image
                $thumbnail = Image::make($pathname . '/' . $iname);
                $thumbnail->resize(50, 50);
                $thumbnail->save($pathname . '/thumbnail/' . $iname);

                // Delete the old image and thumbnail
                $oimage = $product->pimg;
                unlink($pathname . '/thumbnail/' . $oimage);
                unlink($pathname . '/' . $oimage);

                $product->pimg = $iname;
            }
            $product->save();

            return redirect()->route('admin.product.listAll')->with('success', 'Product updated successfully!');
        }

        return redirect()->route('admin.product.listAll')->with('fail', 'Product not found!');
    }
    public function detail(string $id)
    {
        $product = Product::find($id);
        return view('productdetail', ['product' => $product]);
    }
}
