<?php $__env->startSection('title', 'Manage Categories - Admin'); ?>
<?php $__env->startSection('header_title', 'Category CRUD Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="table-custom p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0"><i class="bi bi-tags text-primary me-2"></i>Product Categories</h5>
        <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Add Category
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Total Products</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <?php if($cat->image): ?>
                                <img src="<?php echo e($cat->image); ?>" class="rounded border" style="width: 45px; height: 45px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-light rounded border text-center pt-2" style="width: 45px; height: 45px;"><i class="bi bi-image text-muted"></i></div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold text-dark"><?php echo e($cat->name); ?></td>
                        <td class="text-muted"><?php echo e($cat->slug); ?></td>
                        <td>
                            <span class="badge bg-primary rounded-pill"><?php echo e($cat->products_count); ?> Products</span>
                        </td>
                        <td class="text-end">
                            <a href="<?php echo e(route('admin.categories.edit', $cat->id)); ?>" class="btn btn-sm btn-outline-secondary me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="<?php echo e(route('admin.categories.destroy', $cat->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete category?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No categories created yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <?php echo e($categories->links('pagination::bootstrap-5')); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>