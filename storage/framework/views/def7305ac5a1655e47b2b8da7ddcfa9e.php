<?php $__env->startSection('title', 'Manage Blog Posts - Admin Panel'); ?>
<?php $__env->startSection('header_title', 'Blog Posts Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Blog Articles & Guides</h4>
        <p class="text-muted small mb-0">Publish tech news, tutorials, and skincare advice articles.</p>
    </div>
    <a href="<?php echo e(route('admin.posts.create')); ?>" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg me-1"></i> Add New Post
    </a>
</div>

<!-- Search Bar -->
<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-3">
        <form action="<?php echo e(route('admin.posts.index')); ?>" method="GET" class="d-flex gap-2">
            <input type="text" name="search" class="form-control rounded-pill px-3" placeholder="Search post by title..." value="<?php echo e(request('search')); ?>">
            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Search</button>
            <?php if(request('search')): ?>
                <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-outline-secondary rounded-pill px-3">Clear</a>
            <?php endif; ?>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Image</th>
                        <th>Title & Slug</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Date</th>
                        <th class="pe-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="ps-4">
                                <img src="<?php echo e(Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($post->image)); ?>" class="rounded-3" alt="<?php echo e($post->title); ?>" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?php echo e($post->title); ?></div>
                                <small class="text-muted">/blog/<?php echo e($post->slug); ?></small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border"><?php echo e($post->author); ?></span>
                            </td>
                            <td>
                                <?php if($post->is_published): ?>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">Published</span>
                                <?php else: ?>
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="text-muted"><i class="bi bi-eye me-1"></i> <?php echo e($post->views); ?></span>
                            </td>
                            <td>
                                <small class="text-muted"><?php echo e($post->created_at->format('M d, Y')); ?></small>
                            </td>
                            <td class="pe-4 text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="<?php echo e(route('blog.show', $post->slug)); ?>" target="_blank" class="btn btn-sm btn-outline-info rounded-circle" title="View Article">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.posts.edit', $post->id)); ?>" class="btn btn-sm btn-outline-primary rounded-circle" title="Edit Post">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.posts.destroy', $post->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?');" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" title="Delete Post">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-journal-x display-4 d-block mb-2"></i>
                                No blog posts created yet. Click "Add New Post" above to publish your first article.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($posts->hasPages()): ?>
        <div class="card-footer bg-white p-3 border-0 d-flex justify-content-center">
            <?php echo e($posts->links('pagination::bootstrap-5')); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>