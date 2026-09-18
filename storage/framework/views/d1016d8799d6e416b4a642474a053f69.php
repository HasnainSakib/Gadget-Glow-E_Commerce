<?php $__env->startSection('title', 'Order Placed Successfully - Gadget & Glow'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 text-center">
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white">
                <div class="mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle p-3 shadow" style="width: 80px; height: 80px;">
                        <i class="bi bi-check-lg display-4"></i>
                    </div>
                </div>

                <h2 class="fw-extrabold text-dark mb-2">Thank You for Your Order!</h2>
                <p class="text-muted mb-4">Your order has been received and is currently being processed.</p>

                <!-- 📞 CONFIRMATION CALL ALERT NOTICE -->
                <div class="alert alert-primary border border-primary-subtle rounded-4 p-3 p-md-4 text-start mb-4 shadow-sm" style="background: linear-gradient(135deg, #eff6ff 0%, #ffffff 100%);">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary text-white rounded-circle p-2.5 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                            <i class="bi bi-telephone-inbound-fill fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-primary mb-1">অর্ডার কনফার্মেশন কল বিজ্ঞপ্তি</h5>
                            <p class="mb-0 text-dark fw-medium" style="font-size: 1.05rem;">
                                আমাদের কোম্পানি (Gadget & Glow) থেকে আপনাকে ফোন করে অর্ডারটি কনফার্ম করা হবে।
                            </p>
                            <small class="text-muted">দয়া করে আপনার ফোন কলটি রিসিভ করার জন্য প্রস্তুত থাকুন।</small>
                        </div>
                    </div>
                </div>

                <!-- Order Details Card -->
                <div class="alert alert-light border rounded-4 p-3 text-start mb-4">
                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted small">Order Reference:</span>
                        <strong class="text-primary"><?php echo e($order->order_number); ?></strong>
                    </div>

                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted small">Payment Method:</span>
                        <span class="badge <?php echo e(in_array($order->payment_method, ['bkash', 'nagad', 'rocket']) ? 'bg-warning-subtle text-dark border border-warning' : 'bg-success-subtle text-success border border-success'); ?> px-3 py-1.5 rounded-pill fw-bold">
                            <?php if($order->payment_method == 'bkash'): ?>
                                bKash (বিকাশ)
                            <?php elseif($order->payment_method == 'nagad'): ?>
                                Nagad (নগদ)
                            <?php elseif($order->payment_method == 'rocket'): ?>
                                Rocket (রকেট)
                            <?php else: ?>
                                Cash on Delivery (COD)
                            <?php endif; ?>
                        </span>
                    </div>

                    <?php if($order->payment_ref_code): ?>
                    <div class="border-bottom pb-2 mb-2 bg-warning-subtle p-3 rounded-3 border border-warning">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <span class="text-dark fw-bold small d-block">Your Unique Reference Code:</span>
                                <span class="text-muted extra-small">সেন্ড মানি করার সময় রেফারেন্স বক্সে এই কোডটি লিখবেন</span>
                            </div>
                            <span class="badge bg-amber text-dark fs-5 fw-extrabold px-3 py-1.5 rounded-pill shadow-sm" style="background-color: #fbbf24; letter-spacing: 1px;">
                                <?php echo e($order->payment_ref_code); ?>

                            </span>
                        </div>
                        <div class="pt-2 border-top border-warning-subtle text-start">
                            <small class="text-dark d-block">
                                <strong>সেন্ড মানি করার পার্সোনাল নম্বর:</strong>
                                <?php if($order->payment_method == 'bkash'): ?>
                                    <span class="fw-bold" style="color:#e2136e">bKash (01791806727)</span>
                                <?php elseif($order->payment_method == 'nagad'): ?>
                                    <span class="fw-bold" style="color:#f7921e">Nagad (01791806727)</span>
                                <?php elseif($order->payment_method == 'rocket'): ?>
                                    <span class="fw-bold" style="color:#8c3494">Rocket (017918067270)</span>
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted small">Customer Name:</span>
                        <strong><?php echo e($order->customer_name); ?></strong>
                    </div>

                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted small">Phone Number:</span>
                        <strong><?php echo e($order->customer_phone); ?></strong>
                    </div>

                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted small">Shipping Address:</span>
                        <span class="text-end" style="max-width: 250px;"><?php echo e($order->shipping_address); ?></span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Total Amount:</span>
                        <strong class="fs-5 text-dark">৳<?php echo e(number_format($order->total_amount, 0)); ?></strong>
                    </div>
                </div>

                <h6 class="fw-bold text-start mb-3">Items Ordered:</h6>
                <div class="list-group mb-4 text-start">
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 bg-light rounded-3 mb-2">
                            <div class="d-flex align-items-center gap-3">
                                <img src="<?php echo e($item->product->image); ?>" class="rounded-2" style="width: 45px; height: 45px; object-fit: cover;">
                                <div>
                                    <div class="fw-semibold small text-truncate" style="max-width: 220px;"><?php echo e($item->product->name); ?></div>
                                    <small class="text-muted">Qty: <?php echo e($item->quantity); ?></small>
                                </div>
                            </div>
                            <span class="fw-bold">৳<?php echo e(number_format($item->price * $item->quantity, 0)); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="d-flex gap-3 justify-content-center">
                    <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-primary-custom rounded-pill px-4">
                        <i class="bi bi-shop me-1"></i> Continue Shopping
                    </a>
                    <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-outline-dark rounded-pill px-4">
                        <i class="bi bi-receipt me-1"></i> Track in Admin
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/checkout/success.blade.php ENDPATH**/ ?>