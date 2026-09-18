@extends('layouts.admin')

@section('title', 'Manage Customer Orders - Admin')
@section('header_title', 'Customer Orders & Fulfillment')

@section('content')
<div class="table-custom p-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <h5 class="fw-bold mb-0"><i class="bi bi-receipt text-primary me-2"></i>All Orders</h5>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3 fw-bold">All Status</a>
            <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="btn btn-sm {{ request('status') == 'pending' ? 'btn-warning text-dark' : 'btn-outline-secondary' }} rounded-pill px-3">Pending</a>
            <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" class="btn btn-sm {{ request('status') == 'processing' ? 'btn-info text-white' : 'btn-outline-secondary' }} rounded-pill px-3">Processing</a>
            <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" class="btn btn-sm {{ request('status') == 'completed' ? 'btn-success' : 'btn-outline-secondary' }} rounded-pill px-3">Completed</a>
            <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" class="btn btn-sm {{ request('status') == 'cancelled' ? 'btn-danger' : 'btn-outline-secondary' }} rounded-pill px-3">Cancelled</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Payment</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="fw-bold text-primary">{{ $order->order_number }}</td>
                        <td class="text-muted small">{{ $order->created_at->format('M d, Y h:i A') }}</td>
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
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm fw-semibold rounded-pill style-status-select" style="width: 140px;">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-light border me-1 rounded-pill px-3 fw-semibold">
                                <i class="bi bi-eye"></i> View Order
                            </a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Move Order #{{ $order->order_number }} to Order Bin (Trash)? You can restore it anytime.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Move to Order Bin (Trash)">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No orders match the selected filter.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $orders->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
