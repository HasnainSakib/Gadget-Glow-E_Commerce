<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $sessionId = session()->getId();
        $userEmail = session()->get('customer_email');

        $query = Wishlist::with('product')->latest();

        if ($userEmail) {
            $query->where('customer_email', $userEmail)->orWhere('session_id', $sessionId);
        } else {
            $query->where('session_id', $sessionId);
        }

        $wishlists = $query->get();

        return view('wishlist.index', compact('wishlists'));
    }

    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => ['required', 'regex:/^(?:\+?88)?01[3-9]\d{8}$/'],
        ], [
            'customer_phone.regex' => 'Please enter a valid 11-digit Bangladeshi mobile number starting with 01.',
        ]);

        $sessionId = session()->getId();

        // Save in session for future auto-fill
        session()->put('customer_name', $request->customer_name);
        session()->put('customer_email', $request->customer_email);
        session()->put('customer_phone', $request->customer_phone);

        // Check if already added
        $existing = Wishlist::where('product_id', $id)
            ->where(function ($q) use ($request, $sessionId) {
                $q->where('customer_email', $request->customer_email)
                  ->orWhere('session_id', $sessionId);
            })->first();

        if ($existing) {
            $existing->update([
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
            ]);
            return redirect()->back()->with('info', 'This product is already in your wishlist!');
        }

        Wishlist::create([
            'product_id' => $product->id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'session_id' => $sessionId,
        ]);

        return redirect()->back()->with('success', 'Product added to your Wishlist successfully!');
    }

    public function remove($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->back()->with('success', 'Product removed from your Wishlist!');
    }
}
