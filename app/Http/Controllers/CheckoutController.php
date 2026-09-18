<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $getLogoUrl = function ($settingKey, $defaultRelative) {
            $settingVal = \App\Models\SiteSetting::get($settingKey, $defaultRelative);
            if (!$settingVal) {
                return asset($defaultRelative);
            }
            if (Str::startsWith($settingVal, ['http://', 'https://'])) {
                return $settingVal;
            }
            return asset($settingVal);
        };

        $bkashLogoUrl = $getLogoUrl('bkash_logo', 'images/payments/bkash.svg');
        $nagadLogoUrl = $getLogoUrl('nagad_logo', 'images/payments/nagad.svg');
        $rocketLogoUrl = $getLogoUrl('rocket_logo', 'images/payments/rocket.svg');

        return view('checkout.index', compact('cart', 'total', 'bkashLogoUrl', 'nagadLogoUrl', 'rocketLogoUrl'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => ['required', 'regex:/^(?:\+?88)?01[3-9]\d{8}$/'],
            'shipping_address' => 'required|string|min:10',
            'payment_method' => 'required|in:cod,bkash,nagad,rocket',
        ], [
            'customer_phone.regex' => 'Please enter a valid 11-digit Bangladeshi mobile number starting with 01 (e.g. 01712345678).',
            'shipping_address.min' => 'Please provide a complete shipping address (at least 10 characters).',
            'payment_method.in' => 'Please select a valid payment method.',
        ]);

        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $orderNumber = 'GG-' . strtoupper(uniqid());
        $paymentMethod = $request->input('payment_method', 'cod');
        $paymentRefCode = null;

        if (in_array($paymentMethod, ['bkash', 'nagad', 'rocket'])) {
            $paymentRefCode = $this->generateUniqueRefCode();
        }

        // Wrap database writes in atomic transaction for max speed & safety
        $order = DB::transaction(function () use ($orderNumber, $request, $total, $paymentMethod, $paymentRefCode, $cart) {
            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'shipping_address' => $request->shipping_address,
                'total_amount' => $total,
                'status' => 'pending',
                'payment_method' => $paymentMethod,
                'payment_ref_code' => $paymentRefCode,
            ]);

            foreach ($cart as $productId => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'price' => $details['price'],
                    'quantity' => $details['quantity'],
                ]);

                // Decrement stock in batch database write
                Product::where('id', $productId)->decrement('stock', $details['quantity']);
            }

            return $order;
        });

        // Queue Order Confirmation Email & trigger background queue worker instantly
        try {
            Mail::to($order->customer_email)->queue(new OrderConfirmationMail($order));
            $this->triggerBackgroundQueueWorker();
        } catch (\Throwable $e) {
            Log::error('Failed to queue order confirmation email: ' . $e->getMessage());
        }

        // Cache customer details in session for future instant auto-fill
        session()->put('customer_name', $request->customer_name);
        session()->put('customer_email', $request->customer_email);
        session()->put('customer_phone', $request->customer_phone);
        session()->put('shipping_address', $request->shipping_address);

        session()->forget('cart');

        return redirect()->route('checkout.success', $order->order_number)
            ->with('success', 'Order placed successfully!');
    }

    public function lookupCustomerByPhone($phone)
    {
        $cleanPhone = preg_replace('/[^\d]/', '', $phone);
        if (Str::startsWith($cleanPhone, '880')) {
            $cleanPhone = substr($cleanPhone, 2);
        }

        $order = Order::where('customer_phone', 'like', '%' . substr($cleanPhone, -10))
            ->latest()
            ->first();

        if ($order) {
            return response()->json([
                'found' => true,
                'customer_name' => $order->customer_name,
                'customer_email' => $order->customer_email,
                'shipping_address' => $order->shipping_address,
            ]);
        }

        $wishlist = \App\Models\Wishlist::where('customer_phone', 'like', '%' . substr($cleanPhone, -10))
            ->latest()
            ->first();

        if ($wishlist) {
            return response()->json([
                'found' => true,
                'customer_name' => $wishlist->customer_name,
                'customer_email' => $wishlist->customer_email,
                'shipping_address' => '',
            ]);
        }

        return response()->json(['found' => false]);
    }

    public function success($orderNumber)
    {
        $order = Order::with('items.product')->where('order_number', $orderNumber)->firstOrFail();
        return view('checkout.success', compact('order'));
    }

    /**
     * Generate a 6-character unique reference code (3 uppercase letters + 3 digits)
     */
    private function generateUniqueRefCode(): string
    {
        do {
            $letters = Str::upper(Str::random(3));
            $digits = str_pad((string)random_int(0, 999), 3, '0', STR_PAD_LEFT);
            $code = $letters . $digits;
        } while (Order::where('payment_ref_code', $code)->exists());

        return $code;
    }

    /**
     * Trigger a non-blocking background queue worker process to deliver queued emails immediately
     */
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



