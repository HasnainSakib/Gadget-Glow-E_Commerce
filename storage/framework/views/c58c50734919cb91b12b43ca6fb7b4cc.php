<?php $__env->startSection('title', 'Customer Wishlists - Admin Panel'); ?>
<?php $__env->startSection('header_title', 'Customer Product Wishlists & Interest'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-custom p-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1"><i class="bi bi-heart-fill text-danger me-2"></i>Customer Wishlist Requests</h5>
            <p class="text-muted small mb-0">View interested customers and their requested products.</p>
        </div>

        <!-- Search Bar -->
        <form action="<?php echo e(route('admin.wishlists.index')); ?>" method="GET" class="d-flex gap-2" style="max-width: 380px;">
            <div class="input-group">
                <input type="text" name="search" class="form-control form-control-sm rounded-start-pill ps-3" placeholder="Search customer name, phone, product..." value="<?php echo e(request('search')); ?>">
                <button type="submit" class="btn btn-sm btn-primary rounded-end-pill px-3">Search</button>
            </div>
            <?php if(request('search')): ?>
                <a href="<?php echo e(route('admin.wishlists.index')); ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Clear</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Date & Time</th>
                    <th>Customer Info</th>
                    <th>Requested Product</th>
                    <th>Price</th>
                    <th>Stock Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1"></i> <?php echo e($item->created_at->format('M d, Y')); ?><br>
                            <span class="extra-small"><?php echo e($item->created_at->format('h:i A')); ?></span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark"><?php echo e($item->customer_name ?? 'Guest User'); ?></div>
                            <div class="small">
                                <a href="mailto:<?php echo e($item->customer_email); ?>" class="text-decoration-none me-2"><i class="bi bi-envelope me-1"></i><?php echo e($item->customer_email); ?></a>
                            </div>
                            <div class="small text-primary fw-semibold">
                                <a href="tel:<?php echo e($item->customer_phone); ?>" class="text-decoration-none text-primary"><i class="bi bi-telephone me-1"></i><?php echo e($item->customer_phone); ?></a>
                            </div>
                        </td>
                        <td>
                            <?php if($item->product): ?>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="<?php echo e($item->product->image); ?>" class="rounded border" style="width: 48px; height: 48px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'14\' fill=\'%2378716c\'>Product</text></svg>';">
                                    <div>
                                        <div class="fw-bold text-dark text-truncate" style="max-width: 220px;">
                                            <a href="<?php echo e(route('shop.show', $item->product->slug)); ?>" target="_blank" class="text-dark text-decoration-none hover-primary"><?php echo e($item->product->name); ?></a>
                                        </div>
                                        <small class="text-muted">Category: <?php echo e($item->product->category->name ?? 'General'); ?></small>
                                    </div>
                                </div>
                            <?php else: ?>
                                <span class="text-danger small">Product Deleted</span>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold text-primary">
                            ৳<?php echo e(number_format($item->product->price ?? 0, 0)); ?>

                        </td>
                        <td>
                            <?php if($item->product && $item->product->stock > 0): ?>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1">In Stock (<?php echo e($item->product->stock); ?>)</span>
                            <?php else: ?>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2.5 py-1">Out of Stock</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end">
                            <?php if($item->product): ?>
                                <form action="<?php echo e(route('admin.wishlists.notify', $item->id)); ?>" method="POST" class="d-inline me-1">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-2.5 py-1 fw-bold small" title="Send Restock Email to Customer">
                                        <i class="bi bi-envelope-check-fill me-1"></i> Send Restock Email
                                    </button>
                                </form>
                            <?php endif; ?>
                            <form action="<?php echo e(route('admin.wishlists.destroy', $item->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Remove this wishlist entry?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Delete Wishlist Entry">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-heartbreak text-muted display-5 d-block mb-2"></i>
                            No customer wishlist requests found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <?php echo e($wishlists->appends(request()->query())->links('pagination::bootstrap-5')); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/wishlists/index.blade.php ENDPATH**/ ?>