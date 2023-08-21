<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    function index()
    {
        $cartItems = Cart::getContent();
        return view('cart', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|numeric|min:1', // Assuming quantity should be a positive number
            'image' => 'required',
        ]);

        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart');
    }

}
