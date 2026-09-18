<?php $__env->startSection('title', 'Order Details - Admin'); ?>
<?php $__env->startSection('header_title', 'Order Details #' . $order->order_number); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-4">

    <!-- Order Items & Status Update -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-3">
                <h5 class="fw-bold mb-0">Order Items</h5>
                <span class="text-muted small">Placed on <?php echo e($order->created_at->format('F d, Y \a\t h:i A')); ?></span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light small">
                        <tr>
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Qty</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="<?php echo e($item->product->image); ?>" class="rounded border" style="width: 45px; height: 45px; object-fit: cover;">
                                        <div>
                                            <div class="fw-bold text-dark"><?php echo e($item->product->name); ?></div>
                                            <small class="text-muted">ID: <?php echo e($item->product_id); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>৳<?php echo e(number_format($item->price, 0)); ?></td>
                                <td class="fw-bold"><?php echo e($item->quantity); ?></td>
                                <td class="text-end fw-bold">৳<?php echo e(number_format($item->price * $item->quantity, 0)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <span class="fs-5 fw-bold">Grand Total</span>
                <span class="fs-4 fw-bold text-primary">৳<?php echo e(number_format($order->total_amount, 0)); ?></span>
            </div>
        </div>

        <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-outline-secondary rounded-pill">
            <i class="bi bi-arrow-left me-1"></i> Back to Orders List
        </a>
    </div>

    <!-- Customer Details & Status Control -->
    <div class="col-lg-4">
        <!-- Status Control Box -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <h6 class="fw-bold mb-3">Order Status</h6>

            <form action="<?php echo e(route('admin.orders.updateStatus', $order->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="mb-3">
                    <select name="status" class="form-select fw-bold rounded-3">
                        <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="processing" <?php echo e($order->status == 'processing' ? 'selected' : ''); ?>>Processing</option>
                        <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
                        <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Update Status</button>
            </form>
        </div>

        <!-- Customer Info Box -->
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <h6 class="fw-bold mb-3 border-bottom pb-2">Customer & Payment Info</h6>
            <div class="mb-2">
                <small class="text-muted d-block">Payment Method</small>
                <span class="badge <?php echo e(in_array($order->payment_method, ['bkash', 'nagad', 'rocket']) ? 'bg-warning-subtle text-dark border border-warning' : 'bg-light text-dark border'); ?> px-3 py-1.5 rounded-pill fw-bold">
                    <?php echo e(strtoupper($order->payment_method ?? 'COD')); ?>

                </span>
            </div>
            <?php if($order->payment_ref_code): ?>
            <div class="mb-2">
                <small class="text-muted d-block">Unique Reference Code</small>
                <span class="badge bg-amber text-dark font-monospace fs-6 px-3 py-1.5 rounded-pill" style="background-color: #fef08a; letter-spacing: 1px;">
                    <?php echo e($order->payment_ref_code); ?>

                </span>
            </div>
            <?php endif; ?>
            <div class="mb-2">
                <small class="text-muted d-block">Customer Name</small>
                <strong class="text-dark"><?php echo e($order->customer_name); ?></strong>
            </div>
            <div class="mb-2">
                <small class="text-muted d-block">Email Address</small>
                <a href="mailto:<?php echo e($order->customer_email); ?>" class="text-decoration-none"><?php echo e($order->customer_email); ?></a>
            </div>
            <div class="mb-2">
                <small class="text-muted d-block">Phone Number</small>
                <strong><?php echo e($order->customer_phone); ?></strong>
            </div>
            <div class="mb-0">
                <small class="text-muted d-block">Delivery Address</small>
                <span><?php echo e($order->shipping_address); ?></span>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>