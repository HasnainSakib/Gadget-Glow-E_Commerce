<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ProductRestockedMail;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $query = Wishlist::with('product')->latest();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                  ->orWhere('customer_email', 'like', "%{$search}%")
                  ->orWhere('customer_phone', 'like', "%{$search}%")
                  ->orWhereHas('product', function ($pq) use ($search) {
                      $pq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $wishlists = $query->paginate(15);

        return view('admin.wishlists.index', compact('wishlists'));
    }

    public function notify($id)
    {
        $wishlist = Wishlist::with('product')->findOrFail($id);

        if (!$wishlist->product) {
            return redirect()->back()->with('error', 'Cannot send notification because the product no longer exists.');
        }

        try {
            Mail::to($wishlist->customer_email)->queue(
                new ProductRestockedMail($wishlist->product, $wishlist->customer_name ?? 'Valued Customer')
            );
            $this->triggerBackgroundQueueWorker();

            return redirect()->back()->with('success', 'Restock notification email queued & sent to ' . $wishlist->customer_email . '!');
        } catch (\Throwable $e) {
            Log::error('Failed to send wishlist notification: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send notification email: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->back()->with('success', 'Wishlist item removed successfully!');
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

