@extends('layouts.admin')

@section('title', 'Order Bin (Trash) - Admin')
@section('header_title', 'Order Trash Bin')

@section('content')
<div class="table-custom p-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1 text-danger"><i class="bi bi-trash3-fill me-2"></i>Order Trash Bin</h5>
            <p class="text-muted small mb-0">Soft-deleted customer orders. You can restore them anytime or permanently delete them.</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-bold">
                <i class="bi bi-arrow-left me-1"></i> Back to All Orders
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Order #</th>
                    <th>Date Deleted</th>
                    <th>Customer</th>
                    <th>Payment</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="fw-bold text-danger">{{ $order->order_number }}</td>
                        <td class="text-muted small">{{ $order->deleted_at->format('M d, Y h:i A') }}</td>
                        <td>
                            <div class="fw-semibold">{{ $order->customer_name }}</div>
                            <small class="text-muted">{{ $order->customer_email }} | {{ $order->customer_phone }}</small>
                        </td>
                        <td>
                            <span class="badge {{ in_array($order->payment_method, ['bkash', 'nagad', 'rocket']) ? 'bg-warning-subtle text-dark border border-warning' : 'bg-light text-dark border' }} px-2 py-1 rounded-pill small fw-bold">
                                {{ strtoupper($order->payment_method ?? 'COD') }}
                            </span>
                            @if($order->payment_ref_code)
                                <div class="mt-1"><span class="badge bg-amber text-dark font-monospace" style="background-color: #fef08a; letter-spacing: 0.5px;">Ref: {{ $order->payment_ref_code }}</span></div>
                            @endif
                        </td>
                        <td class="fw-bold text-dark">৳{{ number_format($order->total_amount, 0) }}</td>
                        <td>
                            <span class="badge bg-secondary-subtle text-secondary border rounded-pill px-3 py-1">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <!-- Restore Order Form -->
                            <form action="{{ route('admin.orders.restore', $order->id) }}" method="POST" class="d-inline me-1">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success rounded-pill px-3 fw-semibold shadow-sm" title="Restore Order to All Orders">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i> Restore
                                </button>
                            </form>

                            <!-- Force Delete Form -->
                            <form action="{{ route('admin.orders.forceDelete', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('WARNING: Are you sure you want to PERMANENTLY delete Order #{{ $order->order_number }} from the database? This action CANNOT be undone!');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-semibold" title="Permanently Erase Order">
                                    <i class="bi bi-trash me-1"></i> Delete Permanently
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-trash display-6 d-block text-secondary opacity-50 mb-2"></i>
                            The Trash Bin is currently empty. No soft-deleted orders found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($orders->hasPages())
        <div class="mt-3">
            {{ $orders->links() }}
        </div>
    @endif

</div>
@endsection
