<?php $__env->startSection('title', 'Edit Blog Post - Admin Panel'); ?>
<?php $__env->startSection('header_title', 'Edit Article'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-outline-secondary rounded-pill btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Blog List
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <form action="<?php echo e(route('admin.posts.update', $post->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Article Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-lg rounded-3" value="<?php echo e(old('title', $post->title)); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Short Excerpt / Summary</label>
                        <textarea name="excerpt" rows="3" class="form-control rounded-3"><?php echo e(old('excerpt', $post->excerpt)); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Full Article Content (HTML allowed) <span class="text-danger">*</span></label>
                        <textarea name="content" rows="12" class="form-control rounded-3" required><?php echo e(old('content', $post->content)); ?></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border-0 rounded-4 p-3 mb-4">
                        <h6 class="fw-bold mb-3"><i class="bi bi-image me-1"></i> Featured Article Image</h6>

                        <?php if($post->image): ?>
                            <div class="mb-3 text-center">
                                <img src="<?php echo e(Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($post->image)); ?>" class="rounded-3 img-fluid border" style="max-height: 150px; object-fit: cover;">
                                <div class="text-muted extra-small mt-1">Current Image</div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Upload New Image File</label>
                            <input type="file" name="image_file" class="form-control form-control-sm rounded-3">
                            <small class="text-muted">Leave empty to keep existing image</small>
                        </div>

                        <div class="text-center text-muted small my-2">&mdash; OR &mdash;</div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Image URL</label>
                            <input type="url" name="image_url" class="form-control form-control-sm rounded-3" value="<?php echo e(old('image_url', Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : '')); ?>">
                        </div>
                    </div>

                    <div class="card bg-light border-0 rounded-4 p-3 mb-4">
                        <h6 class="fw-bold mb-3"><i class="bi bi-person-gear me-1"></i> Article Meta</h6>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Author Name <span class="text-danger">*</span></label>
                            <input type="text" name="author" class="form-control rounded-3" value="<?php echo e(old('author', $post->author)); ?>" required>
                        </div>

                        <div class="form-check form-switch mt-3">
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" <?php echo e($post->is_published ? 'checked' : ''); ?>>
                            <label class="form-check-label fw-bold text-dark" for="is_published">Published</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill w-100 py-3 fw-bold">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Post Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/posts/edit.blade.php ENDPATH**/ ?>