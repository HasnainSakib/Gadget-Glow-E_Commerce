<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        $ordersQuery = Order::query();

        $preset = $request->input('preset', 'all_time');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($preset === 'today') {
            $ordersQuery->whereDate('created_at', Carbon::today());
            $startDate = Carbon::today()->format('Y-m-d');
            $endDate = Carbon::today()->format('Y-m-d');
        } elseif ($preset === 'yesterday') {
            $ordersQuery->whereDate('created_at', Carbon::yesterday());
            $startDate = Carbon::yesterday()->format('Y-m-d');
            $endDate = Carbon::yesterday()->format('Y-m-d');
        } elseif ($preset === 'last_7_days') {
            $ordersQuery->where('created_at', '>=', Carbon::now()->subDays(7)->startOfDay());
            $startDate = Carbon::now()->subDays(7)->format('Y-m-d');
            $endDate = Carbon::now()->format('Y-m-d');
        } elseif ($preset === 'this_month') {
            $ordersQuery->whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month);
            $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
            $endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
        } elseif (!empty($startDate) && !empty($endDate)) {
            $ordersQuery->whereBetween('created_at', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay()
            ]);
            $preset = 'custom';
        }

        // Metrics for selected date range
        $filteredTotalOrders = (clone $ordersQuery)->count();
        $filteredRevenue = (clone $ordersQuery)->where('status', '!=', 'cancelled')->sum('total_amount');
        $filteredCompletedOrders = (clone $ordersQuery)->where('status', 'completed')->count();
        $filteredProcessingOrders = (clone $ordersQuery)->where('status', 'processing')->count();
        $filteredPendingOrders = (clone $ordersQuery)->where('status', 'pending')->count();
        $filteredCancelledOrders = (clone $ordersQuery)->where('status', 'cancelled')->count();

        // Overall store metrics
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_amount');

        $recentOrders = Order::latest()->take(6)->get();
        $lowStockProducts = Product::where('stock', '<=', 5)->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalOrders',
            'totalRevenue',
            'recentOrders',
            'lowStockProducts',
            'preset',
            'startDate',
            'endDate',
            'filteredTotalOrders',
            'filteredRevenue',
            'filteredCompletedOrders',
            'filteredProcessingOrders',
            'filteredPendingOrders',
            'filteredCancelledOrders'
        ));
    }
}
