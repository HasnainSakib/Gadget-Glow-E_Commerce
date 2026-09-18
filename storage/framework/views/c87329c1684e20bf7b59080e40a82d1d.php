<?php $__env->startSection('title', 'Manage Products - Admin'); ?>
<?php $__env->startSection('header_title', 'Products CRUD Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-custom p-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1"><i class="bi bi-box-seam text-primary me-2"></i>Product Catalog CRUD</h5>
            <p class="text-muted small mb-0">Browse and edit products category by category.</p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <a href="<?php echo e(route('admin.products.create', request('category') ? ['category' => request('category')] : [])); ?>" class="btn btn-primary rounded-pill px-3 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Add Product
            </a>
        </div>
    </div>

    <!-- Category Filter Tabs -->
    <div class="d-flex flex-wrap gap-2 mb-4 border-bottom pb-3">
        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-sm <?php echo e(!request('category') ? 'btn-primary' : 'btn-outline-secondary'); ?> rounded-pill px-3 fw-bold">
            All Categories
        </a>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('admin.products.index', ['category' => $cat->slug])); ?>" class="btn btn-sm <?php echo e(request('category') == $cat->slug ? 'btn-primary' : 'btn-outline-secondary'); ?> rounded-pill px-3">
                <?php if($cat->slug == 'tech-gadgets'): ?>
                    <i class="bi bi-laptop me-1"></i>
                <?php else: ?>
                    <i class="bi bi-flower1 me-1"></i>
                <?php endif; ?>
                <?php echo e($cat->name); ?> (<?php echo e($cat->products_count); ?>)
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Featured</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" class="rounded border" style="width: 50px; height: 50px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\'><rect width=\'100%\' height=\'100%\' fill=\'%23e2e8f0\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'14\' fill=\'%2364748b\'>No Image</text></svg>';">
                        </td>
                        <td>
                            <div class="fw-bold text-dark"><?php echo e($product->name); ?></div>
                            <small class="text-muted">Slug: <?php echo e($product->slug); ?></small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                <?php echo e($product->category->name); ?>

                            </span>
                        </td>
                        <td class="fw-bold text-success">৳<?php echo e(number_format($product->price, 0)); ?></td>
                        <td>
                            <?php if($product->stock <= 5): ?>
                                <span class="badge bg-danger"><?php echo e($product->stock); ?> (Low)</span>
                            <?php else: ?>
                                <span class="badge bg-success"><?php echo e($product->stock); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($product->is_featured): ?>
                                <span class="badge bg-warning text-dark"><i class="bi bi-star-fill me-1"></i>Yes</span>
                            <?php else: ?>
                                <span class="text-muted small">No</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end">
                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-sm btn-outline-secondary me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No products found for this category filter.</td>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/products/index.blade.php ENDPATH**/ ?>