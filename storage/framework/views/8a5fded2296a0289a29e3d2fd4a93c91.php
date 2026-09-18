<?php $__env->startSection('title', 'Stock Management - Admin'); ?>
<?php $__env->startSection('header_title', 'Category-Wise Stock Management'); ?>

<?php $__env->startSection('content'); ?>

<!-- Overview Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="stat-card border-start border-4 border-primary">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fw-semibold small">TOTAL UNITS IN STOCK</span>
                <div class="stat-icon bg-primary-subtle text-primary">
                    <i class="bi bi-boxes"></i>
                </div>
            </div>
            <h3 class="fw-bold text-dark mb-0"><?php echo e(number_format($totalStock)); ?> Units</h3>
        </div>
    </div>

    <div class="col-md-6">
        <div class="stat-card border-start border-4 border-danger">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fw-semibold small">LOW STOCK WARNINGS (≤ 5)</span>
                <div class="stat-icon bg-danger-subtle text-danger">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
            </div>
            <h3 class="fw-bold text-dark mb-0"><?php echo e($lowStockCount); ?> Products</h3>
        </div>
    </div>
</div>

<div class="table-custom p-4">

    <!-- Category Filter Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1"><i class="bi bi-layers-fill text-primary me-2"></i>Category Inventory Levels</h5>
            <p class="text-muted small mb-0">Monitor and update inventory stock quantities by category.</p>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <a href="<?php echo e(route('admin.stock.index')); ?>" class="btn btn-sm <?php echo e(!request('category') ? 'btn-primary' : 'btn-outline-secondary'); ?> rounded-pill px-3 fw-bold">
                All Categories
            </a>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('admin.stock.index', ['category' => $cat->slug])); ?>" class="btn btn-sm <?php echo e(request('category') == $cat->slug ? 'btn-primary' : 'btn-outline-secondary'); ?> rounded-pill px-3">
                    <?php echo e($cat->name); ?> (<?php echo e($cat->products_count); ?>)
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Product Details</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Current Stock</th>
                    <th class="text-end">Quick Update Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <img src="<?php echo e($product->image); ?>" class="rounded border" style="width: 45px; height: 45px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\'><rect width=\'100%\' height=\'100%\' fill=\'%23e2e8f0\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'14\' fill=\'%2364748b\'>No Image</text></svg>';">
                                <div>
                                    <div class="fw-bold text-dark"><?php echo e($product->name); ?></div>
                                    <small class="text-muted">ID: #<?php echo e($product->id); ?></small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                <?php echo e($product->category->name); ?>

                            </span>
                        </td>
                        <td class="fw-bold">৳<?php echo e(number_format($product->price, 0)); ?></td>
                        <td>
                            <?php if($product->stock <= 5): ?>
                                <span class="badge bg-danger rounded-pill px-3 py-2 fs-6">
                                    <i class="bi bi-exclamation-circle me-1"></i> <?php echo e($product->stock); ?> (Low)
                                </span>
                            <?php else: ?>
                                <span class="badge bg-success rounded-pill px-3 py-2 fs-6">
                                    <i class="bi bi-check-circle me-1"></i> <?php echo e($product->stock); ?> Units
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end">
                            <form action="<?php echo e(route('admin.stock.update', $product->id)); ?>" method="POST" class="d-inline-flex align-items-center gap-2">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <input type="number" name="stock" value="<?php echo e($product->stock); ?>" min="0" class="form-control form-control-sm text-center fw-bold rounded-3" style="width: 85px;">
                                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-3" title="Update Stock">
                                    Save
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No products found for this stock view.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <?php echo e($products->appends(request()->query())->links('pagination::bootstrap-5')); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/stock/index.blade.php ENDPATH**/ ?>