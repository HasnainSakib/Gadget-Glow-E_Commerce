<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ProductRestockedMail;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('products')->get();
        $query = Product::with('category');

        if ($request->has('category') && !empty($request->category)) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $products = $query->latest()->paginate(10);

        $totalStock = Product::sum('stock');
        $lowStockCount = Product::where('stock', '<=', 5)->count();

        return view('admin.stock.index', compact('categories', 'products', 'totalStock', 'lowStockCount'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $oldStock = (int)$product->stock;
        $newStock = (int)$request->stock;

        $product->update([
            'stock' => $newStock,
        ]);

        $notifiedCount = 0;
        if ($oldStock <= 0 && $newStock > 0) {
            $notifiedCount = $this->notifyWishlistedCustomers($product);
        }

        $msg = 'Stock for "' . $product->name . '" updated to ' . $newStock . ' units!';
        if ($notifiedCount > 0) {
            $msg .= " ({$notifiedCount} wishlisted customer(s) notified via email!)";
        }

        return redirect()->back()->with('success', $msg);
    }

    private function notifyWishlistedCustomers(Product $product): int
    {
        $wishlists = Wishlist::where('product_id', $product->id)->get();
        if ($wishlists->isEmpty()) {
            return 0;
        }

        $sentEmails = [];
        foreach ($wishlists as $wishlist) {
            if (empty($wishlist->customer_email) || in_array($wishlist->customer_email, $sentEmails)) {
                continue;
            }

            try {
                Mail::to($wishlist->customer_email)->queue(
                    new ProductRestockedMail($product, $wishlist->customer_name ?? 'Valued Customer')
                );
                $sentEmails[] = $wishlist->customer_email;
            } catch (\Throwable $e) {
                Log::error('Failed to queue restock mail for ' . $wishlist->customer_email . ': ' . $e->getMessage());
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
            Log::error('Failed to trigger background queue worker: ' . $e->getMessage());
        }
    }
}

