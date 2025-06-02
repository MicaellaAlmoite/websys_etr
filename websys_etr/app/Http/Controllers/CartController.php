<?php

namespace App\Http\Controllers;

use Freshbitsweb\LaravelCartManager\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
public function add(Product $product)
{
    Cart::add($product);
    return redirect()->back()->with('success', 'Product added to cart!');
}

public function index()
{
    $cartItems = Cart::get();
    return view('cart.index', compact('cartItems'));
}

public function remove($itemId)
{
    Cart::remove($itemId);
    return redirect()->back()->with('success', 'Product removed from cart!');
}

}
