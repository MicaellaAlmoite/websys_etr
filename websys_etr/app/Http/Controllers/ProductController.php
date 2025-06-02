<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller

{
    public function index(Request $request)
{
    $query = Product::query();

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->has('category')) {
        $query->where('category_id', $request->category);
    }

    $products = $query->paginate(10);
    $categories = Category::all();

    return view('products.index', compact('products', 'categories'));
}
    public function show(Product $product)
{
    return view('products.show', compact('product'));
}

}
