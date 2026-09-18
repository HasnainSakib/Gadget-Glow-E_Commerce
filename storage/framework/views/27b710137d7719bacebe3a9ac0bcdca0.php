<?php $__env->startSection('title', 'Manage Customer Orders - Admin'); ?>
<?php $__env->startSection('header_title', 'Customer Orders & Fulfillment'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-custom p-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <h5 class="fw-bold mb-0"><i class="bi bi-receipt text-primary me-2"></i>All Orders</h5>

        <div class="d-flex gap-2">
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-sm <?php echo e(!request('status') ? 'btn-primary' : 'btn-outline-secondary'); ?> rounded-pill px-3 fw-bold">All Status</a>
            <a href="<?php echo e(route('admin.orders.index', ['status' => 'pending'])); ?>" class="btn btn-sm <?php echo e(request('status') == 'pending' ? 'btn-warning text-dark' : 'btn-outline-secondary'); ?> rounded-pill px-3">Pending</a>
            <a href="<?php echo e(route('admin.orders.index', ['status' => 'processing'])); ?>" class="btn btn-sm <?php echo e(request('status') == 'processing' ? 'btn-info text-white' : 'btn-outline-secondary'); ?> rounded-pill px-3">Processing</a>
            <a href="<?php echo e(route('admin.orders.index', ['status' => 'completed'])); ?>" class="btn btn-sm <?php echo e(request('status') == 'completed' ? 'btn-success' : 'btn-outline-secondary'); ?> rounded-pill px-3">Completed</a>
            <a href="<?php echo e(route('admin.orders.index', ['status' => 'cancelled'])); ?>" class="btn btn-sm <?php echo e(request('status') == 'cancelled' ? 'btn-danger' : 'btn-outline-secondary'); ?> rounded-pill px-3">Cancelled</a>
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
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="fw-bold text-primary"><?php echo e($order->order_number); ?></td>
                        <td class="text-muted small"><?php echo e($order->created_at->format('M d, Y h:i A')); ?></td>
                        <td>
                            <div class="fw-semibold"><?php echo e($order->customer_name); ?></div>
                            <small class="text-muted"><?php echo e($order->customer_email); ?> | <?php echo e($order->customer_phone); ?></small>
                        </td>
                        <td>
                            <span class="badge <?php echo e(in_array($order->payment_method, ['bkash', 'nagad', 'rocket']) ? 'bg-warning-subtle text-dark border border-warning' : 'bg-light text-dark border'); ?> px-2 py-1 rounded-pill small fw-bold">
                                <?php echo e(strtoupper($order->payment_method ?? 'COD')); ?>

                            </span>
                            <?php if($order->payment_ref_code): ?>
                                <div class="mt-1"><span class="badge bg-amber text-dark font-monospace" style="background-color: #fef08a; letter-spacing: 0.5px;">Ref: <?php echo e($order->payment_ref_code); ?></span></div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold text-dark">৳<?php echo e(number_format($order->total_amount, 0)); ?></td>
                        <td>
                            <form action="<?php echo e(route('admin.orders.updateStatus', $order->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm fw-semibold rounded-pill style-status-select" style="width: 140px;">
                                    <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                    <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Processing</option>
                                    <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                    <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td class="text-end">
                            <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-sm btn-light border me-1 rounded-pill px-3 fw-semibold">
                                <i class="bi bi-eye"></i> View Order
                            </a>
                            <form action="<?php echo e(route('admin.orders.destroy', $order->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Move Order #<?php echo e($order->order_number); ?> to Order Bin (Trash)? You can restore it anytime.');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Move to Order Bin (Trash)">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No orders match the selected filter.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <?php echo e($orders->appends(request()->query())->links('pagination::bootstrap-5')); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>