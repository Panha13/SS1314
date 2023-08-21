<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function listAll()
    {
        $categorys = Category::paginate(5); // Assuming you want to paginate the categorys, change the value '10' to your desired pagination limit.

        return view('admin.category.index', compact('categorys'));
    }
    function redirectTocategory(Request $request)
    {
        // // Get the current page from the request
        // $page = $request->query('page', 1);
        // // Redirect back to the category listing with the current page preserved
        // return redirect()->route('admin.category', ['page' => $page]);

         // Get the current page from the request
        $page = $request->query('page', 1);
        // Redirect back to the listAll route with the current page preserved
        return redirect()->route('admin.category.listAll', ['page' => $page]);
    }
    public function add(Request $request)
{
    $request->validate([
        'txtcname' => 'required',
        'txtcdesc' => 'required',
    ]);

    $category = new category();
    $category->cname = $request->input('txtcname');
    $category->cdesc = $request->input('txtcdesc');

    $category->save();

    return $this->redirectTocategory($request);
}
    public function delete(Request $request, $cid)
    {
    $category = Category::find($cid);
    if ($category != null) {
        $category->delete();
        return $this->redirectTocategory($request)->with('success','A product has been deleted successfully!');
        }
        else
            return $this->redirectTocategory($request)->with('fail','product not found!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'txtcid' => 'exists:category,cid',
            'txteditcname' => 'max:255',
            'txteditcdesc' => 'required',
        ]);

        $cid = $request->txtcid;
        $category = category::find($cid);

        if ($category) {
            $category->cname = $request->txteditcname;
            $category->cdesc = $request->txteditcdesc;
            $category->save();

            return redirect()->route('admin.category.listAll')->with('success', 'category updated successfully!');
        }

            return redirect()->route('admin.category.listAll')->with('fail', 'category not found!');
    }
}
