<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('category');
        $search = $request->query('search');
        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');

        $products = Product::when($categoryId, fn($query) => $query->where('category_id', $categoryId))
            ->when($search, fn($query) => $query->where('name', 'like', "%{$search}%"))
            ->when($minPrice, fn($query) => $query->where('price', '>=', $minPrice))
            ->when($maxPrice, fn($query) => $query->where('price', '<=', $maxPrice))
            ->ordered()
            ->get();
        $categories = Category::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
