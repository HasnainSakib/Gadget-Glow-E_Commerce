<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('items.product')->latest();

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Order status updated to ' . ucfirst($request->status) . '!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $orderNumber = $order->order_number;

        // Soft-delete order (moved to trash bin)
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order #' . $orderNumber . ' moved to Order Bin (Trash)! You can restore it anytime.');
    }

    public function bin(Request $request)
    {
        $query = Order::onlyTrashed()->with('items.product')->latest();

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(10);
        return view('admin.orders.bin', compact('orders'));
    }

    public function restore($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $orderNumber = $order->order_number;

        $order->restore();

        return redirect()->route('admin.orders.bin')->with('success', 'Order #' . $orderNumber . ' restored successfully to All Orders!');
    }

    public function forceDelete($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $orderNumber = $order->order_number;

        // Delete associated order items & permanently remove order
        $order->items()->delete();
        $order->forceDelete();

        return redirect()->route('admin.orders.bin')->with('success', 'Order #' . $orderNumber . ' deleted permanently from database!');
    }
}
