<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with(['products' => function($q) {
            $q->latest()->take(10);
        }])->withCount('products')->get();

        $query = Product::with('category');

        // Filter by category
        if ($request->has('category') && !empty($request->category)) {
            $catParam = strtolower($request->category);
            $category = Category::where('slug', $catParam)
                ->orWhere('slug', str_replace('womens-', '', $catParam))
                ->orWhere('slug', 'like', '%' . $catParam . '%')
                ->orWhere('name', 'like', '%' . $catParam . '%')
                ->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Search query
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Featured products / Best Sellers
        $featuredProducts = Product::with('category')->where('is_featured', true)->take(10)->get();
        $bestSellers = Product::with('category')->where('is_featured', true)->inRandomOrder()->take(10)->get();
        if ($bestSellers->isEmpty()) {
            $bestSellers = Product::with('category')->take(10)->get();
        }

        $newArrivals = Product::with('category')->latest()->take(10)->get();
        
        $products = $query->latest()->paginate(12);

        return view('shop.index', compact('categories', 'products', 'featuredProducts', 'bestSellers', 'newArrivals'));
    }

    public function category(Request $request, $slug)
    {
        $catParam = strtolower($slug);
        $category = Category::where('slug', $catParam)
            ->orWhere('slug', str_replace('womens-', '', $catParam))
            ->orWhere('slug', 'like', '%' . $catParam . '%')
            ->orWhere('name', 'like', '%' . $catParam . '%')
            ->firstOrFail();

        $query = Product::with('category')->where('category_id', $category->id);

        // Search within category
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Sorting
        if ($request->has('sort')) {
            if ($request->sort == 'price_low') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_high') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort == 'oldest') {
                $query->orderBy('id', 'asc');
            } else {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(12);

        $allCategories = Category::withCount('products')->get();

        return view('shop.category', compact('category', 'products', 'allCategories'));
    }

    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('shop.show', compact('product', 'relatedProducts'));
    }
}
