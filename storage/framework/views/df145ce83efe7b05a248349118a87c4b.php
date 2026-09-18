<?php $__env->startSection('title', 'Order Bin (Trash) - Admin'); ?>
<?php $__env->startSection('header_title', 'Order Trash Bin'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-custom p-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1 text-danger"><i class="bi bi-trash3-fill me-2"></i>Order Trash Bin</h5>
            <p class="text-muted small mb-0">Soft-deleted customer orders. You can restore them anytime or permanently delete them.</p>
        </div>

        <div class="d-flex gap-2">
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-bold">
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
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="fw-bold text-danger"><?php echo e($order->order_number); ?></td>
                        <td class="text-muted small"><?php echo e($order->deleted_at->format('M d, Y h:i A')); ?></td>
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
                            <span class="badge bg-secondary-subtle text-secondary border rounded-pill px-3 py-1">
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </td>
                        <td class="text-end">
                            <!-- Restore Order Form -->
                            <form action="<?php echo e(route('admin.orders.restore', $order->id)); ?>" method="POST" class="d-inline me-1">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm btn-success rounded-pill px-3 fw-semibold shadow-sm" title="Restore Order to All Orders">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i> Restore
                                </button>
                            </form>

                            <!-- Force Delete Form -->
                            <form action="<?php echo e(route('admin.orders.forceDelete', $order->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('WARNING: Are you sure you want to PERMANENTLY delete Order #<?php echo e($order->order_number); ?> from the database? This action CANNOT be undone!');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-semibold" title="Permanently Erase Order">
                                    <i class="bi bi-trash me-1"></i> Delete Permanently
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-trash display-6 d-block text-secondary opacity-50 mb-2"></i>
                            The Trash Bin is currently empty. No soft-deleted orders found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($orders->hasPages()): ?>
        <div class="mt-3">
            <?php echo e($orders->links()); ?>

        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/orders/bin.blade.php ENDPATH**/ ?>