<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('products')->get();
        $query = Product::with('category');

        if ($request->has('category') && !empty($request->category)) {
            $selectedCategory = Category::where('slug', $request->category)->first();
            if ($selectedCategory) {
                $query->where('category_id', $selectedCategory->id);
            }
        }

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'like', '%' . $search . '%');
        }

        $products = $query->latest()->paginate(10);
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = null;
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $selectedCategoryId = $category->id;
            }
        }
        return view('admin.products.create', compact('categories', 'selectedCategoryId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'required|url',
        ]);

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $request->image,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'required|url',
        ]);

        $oldStock = (int)$product->stock;
        $newStock = (int)$request->stock;

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . $product->id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $newStock,
            'description' => $request->description,
            'image' => $request->image,
            'is_featured' => $request->has('is_featured'),
        ]);

        $notifiedCount = 0;
        if ($oldStock <= 0 && $newStock > 0) {
            $notifiedCount = $this->notifyWishlistedCustomers($product);
        }

        $msg = 'Product updated successfully!';
        if ($notifiedCount > 0) {
            $msg .= " ({$notifiedCount} wishlisted customer(s) notified via email!)";
        }

        return redirect()->route('admin.products.index')->with('success', $msg);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    private function notifyWishlistedCustomers(Product $product): int
    {
        $wishlists = \App\Models\Wishlist::where('product_id', $product->id)->get();
        if ($wishlists->isEmpty()) {
            return 0;
        }

        $sentEmails = [];
        foreach ($wishlists as $wishlist) {
            if (empty($wishlist->customer_email) || in_array($wishlist->customer_email, $sentEmails)) {
                continue;
            }

            try {
                \Illuminate\Support\Facades\Mail::to($wishlist->customer_email)->queue(
                    new \App\Mail\ProductRestockedMail($product, $wishlist->customer_name ?? 'Valued Customer')
                );
                $sentEmails[] = $wishlist->customer_email;
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::error('Failed to queue restock mail for ' . $wishlist->customer_email . ': ' . $e->getMessage());
            }
        }

        if (!empty($sentEmails)) {
            $this->triggerBackgroundQueueWorker();
        }

        return count($sentEmails);
    }

    private function triggerBackgroundQueueWorker(): void
    {
        try {
            $artisan = escapeshellarg(base_path('artisan'));
            if (str_starts_with(PHP_OS, 'WIN')) {
                pclose(popen("start /B php {$artisan} queue:work --stop-when-empty > NUL 2>&1", "r"));
            } else {
                exec("php {$artisan} queue:work --stop-when-empty > /dev/null 2>&1 &");
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Failed to trigger background queue worker: ' . $e->getMessage());
        }
    }
}
